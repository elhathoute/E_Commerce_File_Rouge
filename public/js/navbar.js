$(document).ready(function(){
    $('#show-our-collection').hide();
        $('#our-collection').click(function() {
    $('#show-our-collection').toggle(1000);
    var icon_up_down=$(this).find('.fa');
    if(icon_up_down.hasClass('fa-angle-down')){
        icon_up_down.removeClass('fa-angle-down').addClass('fa-angle-up');
    }else{
        icon_up_down.removeClass('fa-angle-up').addClass('fa-angle-down');
    }
  });
    $('#show-our-collection').hover(function(){
        $(this).show();
    }, function() {
    $(this).hide(1000);
    $('.fa-angle-up').removeClass('fa-angle-up').addClass('fa-angle-down');
  }
  )
     /*------ Hero slider 1 ----*/
     $('.hero-slider-1').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        loop: true,
        dots: true,
        arrows: true,
        prevArrow: '<span class="slider-btn slider-prev"><i class="fi-rs-angle-left"></i></span>',
        nextArrow: '<span class="slider-btn slider-next"><i class="fi-rs-angle-right"></i></span>',
        appendArrows: '.hero-slider-1-arrow',
        autoplay: true,
    });
// fin jquery
});
