$(document).ready(function () {


    jQuery('.goto-form').on('click', function (e) {
        var href = jQuery(this).attr('href');
        jQuery('html, body').animate({
            scrollTop: jQuery(href).offset().top
        }, 1000);
        e.preventDefault();
    });

    $('#menu_btn').click(function () {
        
        $('.main-menu-sec').addClass('open');
        $('body').addClass('scroll_hidden');
    });

    $('.main_menu_close').click(function () {
        close_menu();
    });

    $('.header-search-link').click(function () {
        $('.main-search-sec').addClass('open');
    });

    $('.main_search_close').click(function () {
        close_search();
    });


    jQuery(".np__tabs_sec .nav-pills .nav-link").on('click', function (e) {
        $(".np__tabs_sec .tab-content").show();
    });


    jQuery('.home_tabs_sec_close').on('click', function (e) {
        close_home_tabs_sec();
    });
    jQuery('.floating_btn').on('click', function (e) {
        $(this).siblings().removeClass('active');
        $(this).toggleClass('active');  
    });

    jQuery('.menu-has-child').on('click', function (e) {
        $('.sub-menu').slideUp('active');   
        $(this).closest('.menu-item').siblings().find('.sub-menu').removeClass('active');
        $(this).closest('.menu-item').siblings().find('.menu-has-child').removeClass('active');
        $(this).toggleClass('active');  
        // $(this).next('.sub-menu').toggleClass('active');      
        $(this).next('.sub-menu').stop().slideToggle('active');      
    });


    jQuery('.np__tabs_sec .nav-pills').on('click', function (e){
        if (jQuery(window).width() >= 1140) {

         event.preventDefault();
        var n =  210;
        $('html, body').animate({ scrollTop: n },1000);

        }
         
   });


// jQuery('.np__tabs_sec .nav-pills .nav-link').on('click',function(e){
//         $(".np__tabs_sec .nav-pills .nav-link").removeClass('active');
//         $(this).addClass('active');

//   });


    jQuery('body').keydown(function (e) {

        if (e.keyCode == 27) {
            close_menu();
            close_search();
        }
    });


});


function close_search() {
    jQuery('.main-search-sec').removeClass('open');
}

function close_home_tabs_sec() {
    jQuery('.np__tabs_sec .tab-content').hide();
}

function close_menu() {
    $('.main-menu-sec').removeClass('open');
    $('body').removeClass('scroll_hidden');
}
