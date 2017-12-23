// NOW TIMER
// ----------------------------------- 

(function (window, document, $, undefined) {

    $(function () {

        $('[data-counter]').each(function () {
            var element = $(this),
                format = element.data('format'),
                diff_date = element.data('date');

            function updateTime() {
                var exp = moment(diff_date);//.format(format);
                var now = moment(new Date());
                //var diff = moment(new Date()).diff(dt, 'days');

                var days = now.diff(exp, 'days');
                var hours = now.subtract(days, 'days').diff(exp, 'hours');
                var minutes = now.subtract(hours, 'hours').diff(exp, 'minutes');
                var seconds = now.subtract(minutes, 'minutes').diff(exp, 'seconds');

                element.text(days + ", " + hours + ", " + minutes + ", " + seconds);
            }

            updateTime();
            setInterval(updateTime, 1000);

        });
    });

})(window, document, window.jQuery);
