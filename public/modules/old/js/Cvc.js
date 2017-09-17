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
        masterCategories: new Array(),
        skillsToDelete: new Array(),
        skillsToSave: new Array(),
        news: news = new Alert("#alertNotification"),
        Init: function () {
            this.initPictureForm();
            this.initLanguages();
           // this.initAccordions();
            this.initExperience();
            this.loadCvSkills();
            this.loadCvExperience();
        },
        isObject: function (obj) {
            return obj === Object(obj);
        },
        getDomStars: function (count) {
            if (count === 1) {
                clase = "fa fa-star-o text-danger";
            } else if (count === 2) {
                clase = "fa fa-star-half-o text-warning";
            } else if (count === 3) {
                clase = "fa fa-star text-success";
            }
            return '<i class="' + clase + '"></i>';
        },
        getDomBattery: function (count) {
            if (count === 1) {
                clase = "fa fa-battery-1 text-danger";
            } else if (count === 2) {
                clase = "fa fa-battery-2 text-warning";
            } else if (count === 3) {
                clase = "fa fa-battery-4 text-success";
            }
            return '<i class="' + clase + '"></i>';
        },
        getDomSkill: function (nSkill) {
            return '<span class="col-lg-3 text-center paddingRight5">' +
                    this.getDomBattery(nSkill.lvl)
                    +
                    '</span><span class="col-lg-9 text-left nopadding"><i class="fa"> ' + nSkill.name + '</i> </span>';
        },
        onClickStars: function (nSkill) {
            $("." + nSkill.domElementAdminId()).siblings('.active').removeClass("active");
            $("." + nSkill.domElementAdminId()).addClass("active");
        },
        experienceGen: function (obj) {
            var experience = new $.Experience();
            experience.populate(obj);
            return experience;
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
        loadCvExperience: function (id) {
            var that = this;
            $.get('/cv/load-cv-experience', {id: id}, function (data) {
                $("#ds_experience").html("");
                jQuery.each(data, function (i, obj) {
                    that.setExperience(that.experienceGen(obj));
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
        setExperience: function (experience) {
            console.log(experience);
            $('#ds_experience').append(experience.domComplete());
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
        saveExperience: function () {
            var that = this;
            $.post('/cv/experience-form-submit', $("#CvExperience").serialize(), function (data) {
                //Revisar...
                $("#CvExperience .has-error").removeClass('has-error');
                $("#CvExperience .text-danger").remove();
                if (data.status) {
                    that.setExperience(data.experience);
                } else {
                    for (x in data.msj) {
                        data.msj[x].forEach(function (key) {
                            var err = '<p class="text-danger">' + key + '</p>';
                            $("[name='" + x + "']").after(err);
                            $("[name='" + x + "']").parent().parent(".form-group").addClass('has-error');

                        });
                    }
                }
            });
        },
        saveLanguage: function () {

        },
        savePersonalInformation: function () {
            var that = this;
            $.post('/cv/personal-inf-submit', $("#CvPersonalInformation").serialize(), function (data) {
                //Revisar...
                $("#CvPersonalInformation .has-error").removeClass('has-error');
                $("#CvPersonalInformation .text-danger").remove();
                if (that.isObject(data)) {
                    for (x in data) {
                        data[x].forEach(function (key) {
                            var err = '<p class="text-danger">' + key + '</p>';
                            $("[name='" + x + "']").after(err);
                            $("[name='" + x + "']").parent().parent(".form-group").addClass('has-error');

                        });
                    }
                } else {
                    $("#persInfData").html(data);
                    $('#persInf').popover('hide');
                }
            });
        },
        initPictureForm: function () {
            var bar = $('#bar');
            var that = this;
            $('#CvPicture').ajaxForm({
                beforeSend: function () {
                    bar.removeClass("notransition")
                    var percentVal = '0%';
                    bar.width(percentVal);
                    $('#percent').html(percentVal);
                },
                uploadProgress: function (event, position, total, percentComplete) {
                    var percentVal = percentComplete + '%';
                    bar.attr('aria-valuenow', percentComplete);
                    bar.width(percentVal);
                    $('#percent').html(percentVal);

                },
                complete: function (xhr) {
                    var percentVal = '100%';
                    bar.width(percentVal)
                    bar.removeClass("progress-bar-warning");
                    bar.addClass("progress-bar-success");
                    $('.CvPicture').html(xhr.responseText);
                    setTimeout(that.resetBar(), 300);
                }
            });

            $('#btnpicture').change(function () {
                $("#CvPicture").submit();
            });
        },
        resetBar: function () {
            $('#bar').addClass("notransition");
            $('#bar').attr('style', "width: 0%");
            $('#bar').removeClass("progress-bar-success");
            $('#bar').addClass("progress-bar-warning");
            $('#collapsePictureForm').collapse('hide');

        },
        initLanguages: function () {
            var that = this;
            $('#collapseLanguages').on('show.bs.collapse', function () {
                if (!$("#combobox_languages").length) {
                    that.loadLanguages();
                }
            });
        },
        initExperience: function () {
            var that = this;
            $('#collapseExperience').on('show.bs.collapse', function () {
                $.get('/cv/experience-form', function (data) {
                    $("#form_experience").html(data);
                    that.initCompanyFinder();
                }
                );
            });
        },
        initCompanyFinder: function () {
            $('#companyFinder').after('<div id="companyList"></div>');
            $('#companyList').btsListFilter('#companyFinder', {resetOnBlur: false, initial: false,
                sourceData: function (text, callback) {
                     $("#companyList").show();
                    return $.get('/cv/get-companies?q=' + text, callback);
                },
                sourceNode: function (data) {
                    return $('<a class="list-group-item well pointer"  onclick="cv.selectCompany(\'' + data.name + '\')"><span> <b>' + data.name + '</b></span></a>');
                },
                emptyNode: function (data) {
                    return $('<a class="list-group-item well" ><span> <b>"' + data + '"</b></span></a>');
                }
            });
        },
        selectCompany: function(name){
            $("#companyFinder").val(name);
            $("#companyList").hide();
        },
        initAccordions: function () {

            var $active = $('.accordionplus .panel-collapse.in').prev().addClass('active');
            $active.find('a').append('<span class="glyphicon glyphicon-minus pull-right"></span>');
            $('.accordionplus .panel-heading').not($active).find('a').prepend('<span class="glyphicon glyphicon-plus pull-right"></span>');
            $('.accordionplus').on('show.bs.collapse', function (e)
            {
                $('#accordion .panel-heading.active').removeClass('active').find('.glyphicon').toggleClass('glyphicon-plus glyphicon-minus');
                $(e.target).prev().addClass('active').find('.glyphicon').toggleClass('glyphicon-plus glyphicon-minus');
            });
            $('.accordionplus').on('hide.bs.collapse', function (e)
            {
                $(e.target).prev().removeClass('active').find('.glyphicon').removeClass('glyphicon-minus').addClass('glyphicon-plus');
            });

        },
        loadLanguages: function () {

            $.get('/cv/load-languages', function (data) {
                var s = $('<select id="combobox_languages" />');
                for (x in data) {
                    s.append($('<option id="' + data[x].id + '" />').html(data[x].name));
                }
                $('#slanguage').html(s);
            }
            );
        },
        setLanguage: function () {
            var indice = $("#combobox_languages").prop('selectedIndex');
            var lang = $("#combobox_languages").val();
            alert(indice + lang + " - " + lvl);
            var cstars = getLevel(lvl);
        }

    };

}(jQuery));
