(function ($) {
    $.CV_SKILL = function (element) {
        this.element = (element instanceof $) ? element : $(element);
    };
    $.CV_SKILL.prototype = {
        news: null,
        containerSkills: null,
        skills: new Array(),
        skillsToDelete: new Array(),
        skillsToSave: new Array(),
        init: function () {
            //var that = this;
            this.containerSkills = $("#cv-skills");
            $.get('/pi/cv-skill/main', function (data) {
                $("#form-cv-skills").html(data);
            }
            );

            this.loadSkill();
        },
        loadSkill: function (skill) {
            var that = this;
            $.post('/pi/cv-skill/load', function (data) {
                    that.containerSkills.html("");
                data.forEach(function (item, index) {
                    skill = that.getSkill(item.id, item.name);
                    skill.setLvl(item.lvl);
                    that.refreshViewSkill(skill, "new");
                });
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
                    that.refreshViewSkill(skill, data.status);
                    return true;
                } else {
                    skill.setLvl(0);
                    //that.news.danger(data.msj, 3000);
                    return false;
                }
            }
            );
        },
        getSkill: function (id, name) {
            //Verifico si el skill ya esta cargado
            if ((id in this.skills)) {
                return  this.skills[id];
            }
            //Create Skill
            this.skills[id] = new $.SKILL();
            this.skills[id].id = id;
            this.skills[id].name = name;
            this.skills[id].status = 'new';
            return this.skills[id];

        },
        setSkill: function (id, name, lvl) {
            //Create Skill
            skill = this.getSkill(id, name);
            skill.setLvl(lvl);

            if (skill.status === "change" || skill.status === "delete") {
                this.saveSkill(skill);
            }
        },
        refreshViewSkill: function (skill, status) {
            if (status === "change") {
                $("#" + skill.getDomElementId()).html(skill.getDomSkill());
            } else if (status === "new") {
                var cSkill = skill.getContainer();
                this.containerSkills.append(cSkill);
            } else if (status === "delete") {
                $("#" + skill.getDomElementId()).remove();
            }
        }

    };

}(jQuery));
