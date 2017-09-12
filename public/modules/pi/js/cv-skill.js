(function ($) {
    $.CV_SKILL = function (element) {
        this.element = (element instanceof $) ? element : $(element);
    };
    $.CV_SKILL.prototype = {
        news: null,
        skills: new Array(),
        skillsToDelete: new Array(),
        skillsToSave: new Array(),
        init: function () {
            var that = this;
            $.get('/pi/cv-skill/main', function (data) {
                $("#form-cv-skills").html(data);
            }
            );
        },
        saveSkill: function (skill) {
            var that = this;
            $.post('/pi/cv-skill/save', {id: skill.id, lvl: skill.lvl}, function (data) {
                console.log(data);
                if (data.success === true) {
                    //that.news.warning("Skill Guardado ", 1000);
                    //Si el save es exitoso, actualizo el CV con esta Skill
                    //this.refreshViewSkill(skill, status);
                    return true;
                } else {
                    skill.setLvl(0);
                    //that.news.danger(data.msj, 3000);
                    return false;
                }
            }
            );
        },
        getSkill: function (id) {
            //Verifico si el skill ya esta cargado
            if ((id in this.skills)) {
                return  this.skills[id];
            }
            //Create Skill
            this.skills[id] = new $.SKILL();
            this.skills[id].id = id;
            this.skills[id].status = 'new';
            return this.skills[id];

        },
        setSkill: function (id, lvl) {

            //Create Skill
            skill = this.getSkill(id);
            skill.setLvl(lvl);

            if (skill.status === "change" || skill.status === "delete") {
                this.saveSkill(skill);
            }
        },
        refreshViewSkill: function (skill, status) {
            if (status === "change") {
                $("#" + skill.domElementId()).html(this.getDomSkill(skill));
            } else if (status === "new") {
                var cSkill = $('<div id="' + skill.domElementId() + '" class="col-lg-12  btn-default nopadding" >' +
                        this.getDomSkill(skill) + '</div>');
                this.containerSkills.append(cSkill);
            } else if (status === "delete") {
                $("#" + skill.domElementId()).remove();
            }
        }

    };

}(jQuery));
