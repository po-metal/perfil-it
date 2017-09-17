(function ($) {
    $.SKILL = function (element) {
        this.element = (element instanceof $) ? element : $(element);
    };
    $.SKILL.prototype = {
        //PROPERTIES
        id: null,
        // new: new Skill, delete: need be remove, change: need persist, ok: no change
        state: null,
        lvl: null,
        name: null,
        categoryId: null,
        categoryName: null,
        domAdmin: null,
        container: null,
        container_class: 'col-lg-6 col-md-6 col-sm-12 col-xs-12  btn-default skillPadding',
        //ADMIN
        populate: function (obj) {
            for (var prop in obj) {
                this[prop] = obj[prop];
            }
        },
        getDomAdminIdByLvl: function () {
            return '#' + "s_" + this.lvl + '_' + this.id;
        },
        applyStyleByLvl: function () {
            $(this.getDomAdminIdByLvl()).siblings('.active').removeClass("active");
            $(this.getDomAdminIdByLvl()).addClass("active");
        },
        setLvl: function (lvl) {

            if (lvl === 0) {
                this.status = 'delete';
            } else if (this.lvl !== lvl) {
                this.status = 'change';
            } else {
                this.status = 'ok';
            }
            console.log(this.status);
            this.lvl = lvl;
            this.applyStyleByLvl();
        },
        //VIEW
         getDomElementId: function (){
            return "skill_" + this.id;
        },
        getContainer: function () {
            if (this.container === null) {
                this.createContainer();
            }
            return this.container;
        },
       
        createContainer: function () {
            this.container = $('<div id="'+ this.getDomElementId() + '" class="' + this.container_class + '" >' +
                    this.getDomSkill() + '</div>');
        },
        getClassIcon: function () {
            if (1 === this.lvl) {
                clase = "fa fa-battery-1 text-warning";
            } else if (2 === this.lvl) {
                clase = "fa fa-battery-2 text-success";
            } else if (3 === this.lvl) {
                clase = "fa fa-battery-4 text-primary";
            }
            return clase;
        },
        getDomIcon: function () {
            return '<i class="' + this.getClassIcon() + '"></i>';
        },
        getDomSkill: function () {
            return '<span class="col-lg-2 col-md-3 col-sm-4 text-center skillPadding">' +
                    this.getDomIcon() +
                    '</span>' +
                    '<span class="col-lg-10 col-md-9 col-sm-8 text-left skillPadding">' +
                    '<i class="fa"> ' +
                    this.name +
                    '</i>' +
                    '</span>';
        }
    };
}
(jQuery)
        );
