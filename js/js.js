$(document).ready(function () {
    $('a.menu').hover(function () {
        $('a.menu').removeClass('hover');
        $(this).addClass('hover');
    });

    // $('a.menu').click(function () {
    //     $(this).toggleClass( 'active');
    // });
});