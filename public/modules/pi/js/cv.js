(function ($) {
    $.CV = function (element) {
        this.element = (element instanceof $) ? element : $(element);
    };
    $.CV.prototype = {
        news: new Alert("#alertNotification"),
        cv_picture: null,
        cv_personal_information: null,
        cv_contact: null,
        cv_skill: null,
        init: function () {
            console.log("init cv");
            this.initPictureForm();
            this.initPersonalInformationForm();
            this.initContact();
             this.initSkill();
        },
        initPictureForm: function () {
            console.log("init picture");
            this.cv_picture = new $.CV_PICTURE();
            this.cv_picture.init();

        },
        initPersonalInformationForm: function () {
            console.log("init personal information");
            this.cv_personal_information = new $.CV_PERSONAL_INFORMATION();
            this.cv_personal_information.init();
        },
        initContact: function () {
            console.log("init contact");
            this.cv_contact = new $.CV_CONTACT();
            this.cv_contact.init();
        },
        initSkill: function () {
            console.log("init skill");
            this.cv_skill = new $.CV_SKILL();
            this.cv_skill.news = this.news;
            this.cv_skill.init();
        }
    };

}(jQuery));
