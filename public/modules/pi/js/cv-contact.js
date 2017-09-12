(function ($) {
    $.CV_CONTACT = function (element) {
        this.element = (element instanceof $) ? element : $(element);
    };
    $.CV_CONTACT.prototype = {
        init: function () {
            var that = this;
            $.get('/pi/cv-contact/main', function (data) {
                $("#form-cv-contact").html(data.form);
                that.ajaxForm();
            }
            );
        },
        ajaxForm: function () {
            var that = this;
            $('#CvContact').ajaxForm({
                complete: function (xhr) {
                    console.log(xhr);
                    if (xhr.responseJSON.status) {
                        $('#cv-contact').html(xhr.responseJSON.view);
                        $('#cv-contact-modal').modal('hide');
                    }

                    $("#form-cv-contact").html(xhr.responseJSON.form);
                    that.ajaxForm();
                }
            });
        }
    };

}(jQuery));
