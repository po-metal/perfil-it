(function ($) {
    $.CV_CONTACT = function (element) {
        this.element = (element instanceof $) ? element : $(element);
    };
    $.CV_CONTACT.prototype = {
        init: function () {
            var that = this;
            $.get('/pi/cv-contact/main', function (data) {
                $("#form-cv-contact").html(data);
                that.ajaxForm();
            }
            );
        },
        ajaxForm: function () {
            $('#CvContact').ajaxForm({
                complete: function (xhr) {
                    $('#cv-contact').html(xhr.responseText);
                    $('#cv-contact-modal').modal('hide');
                }
            });
        }
    };

}(jQuery));
