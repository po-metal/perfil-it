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
        cv_education: null,
        cv_experience: null,
        init: function () {
            this.initPictureForm();
            this.initPersonalInformationForm();
            this.initContact();
            this.initSkill();
            this.initEducation();
            this.initExperience();
            console.log("init cv");

        },
        initPictureForm: function () {
            this.cv_picture = new $.CV_PICTURE();
            this.cv_picture.init();

        },
        initPersonalInformationForm: function () {
            this.cv_personal_information = new $.CV_PERSONAL_INFORMATION();
            this.cv_personal_information.init();
        },
        initContact: function () {
            this.cv_contact = new $.CV_CONTACT();
            this.cv_contact.init();
        },
        initSkill: function () {
            this.cv_skill = new $.CV_SKILL();
            this.cv_skill.news = this.news;
            this.cv_skill.init();
        },
        initEducation: function () {
            this.cv_education = new $.CV_EDUCATION();
            this.cv_education.init();
        },
        initExperience: function () {
            this.cv_experience = new $.CV_EXPERIENCE();
        }
    };

}(jQuery));
