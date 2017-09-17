(function ($) {
    $.CV_EXPERIENCE = function (element) {
        this.element = (element instanceof $) ? element : $(element);
    };
    $.CV_EXPERIENCE.prototype = {
        news: null,
        container: null,
        experiences: new Array(),
        init: function () {
            //var that = this;
            this.container = $("#cv-experiences");
            $.get('/pi/cv-experience/main', function (data) {
                $("#form-cv-experience").html(data);
            }
            );

            this.load();
        },
        load: function (skill) {
            var that = this;
            $.post('/pi/cv-experience/load', function (data) {
                data.forEach(function (item, index) {
                    entity = that.getEntity(item.id, item.name);
                    that.refresh(entity, "new");
                });
            }
            );
        },
        save: function (skill) {
            var that = this;
            $.post('/pi/cv-skill/save', {id: skill.id, lvl: skill.lvl}, function (data) {
                console.log(data);
                if (data.success === true) {
                    //that.news.warning("Skill Guardado ", 1000);
                    //Si el save es exitoso, actualizo el CV con esta Skill
                    that.refresh(skill, data.status);
                    return true;
                } else {
                    skill.setLvl(0);
                    //that.news.danger(data.msj, 3000);
                    return false;
                }
            }
            );
        },
        getEntity: function (id, name) {
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
        refresh: function (skill, status) {
            if (status === "change") {
                $("#" + skill.getDomElementId()).html(skill.getDomSkill());
            } else if (status === "new") {
                var cSkill = skill.getContainer();
                this.container.append(cSkill);
            } else if (status === "delete") {
                $("#" + skill.getDomElementId()).remove();
            }
        }

    };

}(jQuery));
