(function () {

    $('.subscription-form').parsley().on('form:submit', function () {

        var $form = this.$element;
        var $success = $($form.data('success-element'));
        var $error = $($form.data('error-element'));
        var action = $form.attr('action');

        $error.text("");
        $success.text("");

        $.ajax({
            url: action,
            type: 'POST',
            data: $form.serializeArray(),
            dataType: 'JSON',
            success: function (e) {
                if (e.status)
                    $success.html(e.message);
                else
                    $error.html(e.message);
            },
            error: function (e) {
                $error.text('Failed to subscribe');
                console.log(e);
            }
        });

        return false;
    });

})(jQuery);