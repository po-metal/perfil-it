(function ($) {
    $.CV_EXPERIENCE = function (element) {
        this.element = (element instanceof $) ? element : $(element);
    };
    $.CV_EXPERIENCE.prototype = {
        showLoading: function () {
            $("#form-cv-experience").html('<i class="fa fa-spin fa-spinner"></i>');
        },
        getContainer: function (id = null) {
            var container = $("#exp_" + id);
            if (container.length) {
                return container;
            } else {
                return $('<div id="exp_' + id + '"></div>');
        }
        },
        add: function () {
            var that = this;
            console.log("add");
            this.showLoading();
            $.get('/pi/cv-experience/main', function (data) {
                $("#form-cv-experience").html(data.form);
                that.ajaxForm();
            }
            );
        },
        edit: function (id) {
            var that = this;
            console.log("edit:" + id);
            this.showLoading();
            $.get('/pi/cv-experience/main/' + id, function (data) {
                $("#form-cv-experience").html(data.form);
                that.ajaxForm(id);
            }
            );
        },
        ajaxForm: function (id = null) {
            var that = this;
            $('#CvExperience').ajaxForm({
                complete: function (xhr) {
                    console.log(xhr);
                    if (xhr.responseJSON.status) {
                        var container = that.getContainer(id);
                        container.html(xhr.responseJSON.view);
                        if (xhr.responseJSON.new) {
                            $('#cv-experience').append(container);
                        }
                        $('#cv-experience-modal').modal('hide');
                    }
                    $("#form-cv-experience").html(xhr.responseJSON.form);
                    that.ajaxForm();

                }
            });
        }

    };

}(jQuery));
