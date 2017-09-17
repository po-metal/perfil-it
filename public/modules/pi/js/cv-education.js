(function ($) {
    $.CV_EDUCATION = function (element) {
        this.element = (element instanceof $) ? element : $(element);
    };
    $.CV_EDUCATION.prototype = {
        init: function () {
            var that = this;
            $.get('/pi/cv-education/main', function (data) {
                $("#form-cv-education").html(data.form);
                that.ajaxForm();
            }
            );
        },
        ajaxForm: function () {
            var that = this;
            $('#CvEducation').ajaxForm({
                complete: function (xhr) {
                    console.log(xhr);
                    if (xhr.responseJSON.status) {
                        $('#cv-education').html(xhr.responseJSON.view);
                        $('#cv-education-modal').modal('hide');
                    }

                    $("#form-cv-education").html(xhr.responseJSON.form);
                    that.ajaxForm();
                }
            });
        }
    };

}(jQuery));
