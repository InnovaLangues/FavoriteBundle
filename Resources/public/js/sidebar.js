(function () {
    'use strict';

    window.ClarolineRightBar = null;

    if ($('#right-bar').html().replace(/^\s+/g, '').replace(/\s+$/g, '') !== '') {
        $('#right-bar').parent().removeClass('hide');
        $('#right-bar .list-group-item.disabled').html(
            '<span class="icon-heart"></span>' + $('#right-bar .list-group-item.disabled'
        ).html());
        $('body').addClass('right-bar-push');
        $('#top_bar').addClass('right-bar-push');
        $('.impersonalitation > .navbar-fixed-top').addClass('right-bar-push');
    }

    $('body').on('mouseenter', '#right-bar', function (event) {
        //if correct bug chrome inside select autside element
        if (event.clientX !== 0 && event.clientY !== 0) {
            var element = this;
            clearTimeout(window.ClarolineRightBar);
            window.ClarolineRightBar = setTimeout(function () {
                $(element).animate({width: '400px'}, 300);
            }, 200);
        }
    });

    $('body').on('mouseleave', '#right-bar', function () {
        var element = this;
        clearTimeout(window.ClarolineRightBar);
        window.ClarolineRightBar = setTimeout(function () {
            $('.in', element).each(function () {
                $(this).removeClass('in');
                $(this).addClass('collapse');
            });

            $(element).animate({width: '40px'}, 300);
        }, 200);
    });

}());
