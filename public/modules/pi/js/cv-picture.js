(function ($) {
    $.CV_PICTURE = function (element) {
        this.element = (element instanceof $) ? element : $(element);
    };
    $.CV_PICTURE.prototype = {
        init: function () {
            var that = this;
            $.get('/pi/cv-picture/main', function (data) {
                $("#form-cv-picture").html(data);
                that.ajaxForm();
            }
            );
        },
        ajaxForm: function () {
            var bar = $('#cv-picture-bar');
            var that = this;
            $('#CvPicture').ajaxForm({
                beforeSend: function () {
                    bar.removeClass("notransition")
                    var percentVal = '0%';
                    bar.width(percentVal);
                    $('#picture-percent').html(percentVal);
                },
                uploadProgress: function (event, position, total, percentComplete) {
                    var percentVal = percentComplete + '%';
                    bar.attr('aria-valuenow', percentComplete);
                    bar.width(percentVal);
                    $('#picture-percent').html(percentVal);

                },
                complete: function (xhr) {
                    var percentVal = '100%';
                    bar.width(percentVal)
                    bar.removeClass("progress-bar-warning");
                    bar.addClass("progress-bar-success");
                    $('#cv-picture').html(xhr.responseText);
                    $('#cv-picture-modal').modal('hide');
                    setTimeout(that.resetBar(), 2000);
                }
            });

            $('#btnpicture').change(function () {
                $("#CvPicture").submit();
            });
        },
        resetBar: function () {
            $('#cv-picture-bar').addClass("notransition");
            $('#cv-picture-bar').attr('style', "width: 0%");
            $('#cv-picture-bar').removeClass("progress-bar-success");
            $('#cv-picture-bar').addClass("progress-bar-warning");
            $('#collapsePictureForm').collapse('hide');
        }
    };

}(jQuery));
