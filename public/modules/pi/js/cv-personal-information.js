(function ($) {
    $.CV_PERSONAL_INFORMATION = function (element) {
        this.element = (element instanceof $) ? element : $(element);
    };
    $.CV_PERSONAL_INFORMATION.prototype = {
        init: function () {
            var that = this;
            $.get('/pi/cv-personal-information/main', function (data) {
                $("#form-cv-personal-information").html(data);
                that.ajaxForm();
            }
            );
        },
        ajaxForm: function () {
            $('#CvPersonalInformation').ajaxForm({
                complete: function (xhr) {
                    $('#cv-personal-information').html(xhr.responseText);
                      $('#cv-personal-information-modal').modal('hide');
                }
            });
        }
    };

}(jQuery));
