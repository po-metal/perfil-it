(function ($) { //an IIFE so safely alias jQuery to $
    $.Cv = function (element) { //renamed arg for readability

//stores the passed element as a property of the created instance.
//This way we can access it later
        this.element = (element instanceof $) ? element : $(element);
        //instanceof is an extremely simple method to handle passed jQuery objects,
        //DOM elements and selector strings.
        //This one doesn't check if the passed element is valid
        //nor if a passed selector string matches any elements.
    };
    //assigning an object literal to the prototype is a shorter syntax
    //than assigning one property at a time
    $.Cv.prototype = {
        skills: new Array(),
        skillsToDelete: new Array(),
        skillsToSave: new Array(),
        news: news = new Alert("#alertNotification"),
        Init: function () {
            this.loadCvSkills();
        },
        isObject: function (obj) {
            return obj === Object(obj);
        },
        onClickStars: function (nSkill) {
            $("." + nSkill.domElementAdminId()).siblings('.active').removeClass("active");
            $("." + nSkill.domElementAdminId()).addClass("active");
        },
        skillGen: function (obj) {
            var skill = new $.Skill();
            skill.populate(obj);
            return skill;
        },
        skillMasterCategoryGen: function (nSkill) {
            var masterCategory = new $.MasterCategory();
            masterCategory.id = nSkill.masterCategoryId;
            masterCategory.name = nSkill.masterCategoryName;
            masterCategory.header = $('<h5 class="page-header nopadding margin5" >' + masterCategory.name + '</h5>');
            masterCategory.domElement = $('<div id="smc_' + masterCategory.id + '" ></div>').addClass('col-lg-3 col-md-4 col-sm-6 col-sm-12');
            masterCategory.domElement.append(masterCategory.header);
            return masterCategory;
        },
        loadCvSkills: function () {
            var that = this;
            $.get('/cv/load-cv-skills', function (data) {
                $("#ds_skills").html("");
                jQuery.each(data, function (i, obj) {
                    var nSkill = that.skillGen(obj);

                    that.setSkill(nSkill);

                });
            }
            );
        },
        domSkillByStatus: function (nSkill, status) {
            if (status === "change") {
                $("#" + nSkill.domElementId()).html(this.getDomSkill(nSkill));
            } else if (status === "new") {
                var cSkill = $('<div id="' + nSkill.domElementId() + '" class="col-lg-12  btn-default nopadding" >' +
                        this.getDomSkill(nSkill) + '</div>');
                this.masterCategories[nSkill.masterCategoryId].domElement.append(cSkill);
            } else if (status === "delete") {
                $("#" + nSkill.domElementId()).remove();
            }
        },
        setNatSkill: function (lvl, obj) {
            nSkill = this.skillGen(obj);
            nSkill.lvl = lvl;
            this.setSkill(nSkill, true);
        },
        setSkill: function (nSkill, save) {
            //Aplico CSS al elegido
            this.onClickStars(nSkill);

            //status
            var status = false;
            //Verifico si la categoria existe en DOM #smc:skill_master_category
            if (!$("#smc_" + nSkill.masterCategoryId).length) {
                //Genero La MasterCategory
                var masterCategory = this.skillMasterCategoryGen(nSkill);
                //Agrego la MasterCategory
                this.masterCategories[masterCategory.id] = masterCategory;
                $("#ds_skills").append(masterCategory.domElement);
            }

            //Verify if skill exist and if change
            if (!(nSkill.id in this.skills)) {
                this.skills[nSkill.id] = nSkill;
                status = "new";
            } else if (this.skills[nSkill.id].lvl !== nSkill.lvl) {
                if (nSkill.lvl === 0) {
                    delete this.skills[nSkill.id];
                    status = "delete";
                } else {
                    this.skills[nSkill.id] = nSkill;
                    status = "change";
                }

            }
            if (save === true) {
                this.saveSkill(nSkill);
            }

            this.domSkillByStatus(nSkill, status);
        },
        saveSkill: function (nSkill) {
            var that = this;
            $.post('/cv/save-skill', {skillId: nSkill.id, lvl: nSkill.lvl}, function (data) {
                if (data.success === true) {
                    that.news.warning("Skill Guardado ", 1000);
                    return true;
                } else {
                    that.news.danger(data.msj, 3000);
                    return false;
                }
            }
            );
        },
       
    };

}(jQuery));
