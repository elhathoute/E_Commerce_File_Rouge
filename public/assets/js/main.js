$(document).ready(function() {
    /*------------------show image selected----------*/
    $('#images').on('change', function() {
        // empty div of show images
        // $('#image-preview').empty();
        // get all files
        var files = $(this)[0].files;
    // loop to each file(image)
        for (var i = 0; i < files.length; i++) {
            //define a variable named file
          var file = files[i];
          /*creates a new instance of the FileReader object,
          which is used to read the contents of the file*/
          var reader = new FileReader();

          reader.onload = function(e) {
            var image = $('<img>').attr('src', e.target.result);
           var div = $('<div class="col-md-4">  </div>').append(image);
            $('#image-preview').append(div);
          }

          /*reads the contents of a file specified by the file parameter
          and returns a data URL representing the file's contents.*/
          reader.readAsDataURL(file);
        }
      });
      /*-------------------------------------------*/
    /*---------------add product with multi sizes-images-colors....*/
// category and sub category
$('#sub-category').html('<option value="">Loading...</option>');

    $('#category').on('change',function(e){
       var category = $(this).val();

       $.ajax({
        url: '/getSubCategory',
        method: 'GET',
        data: {
          category: category
        },
        success: function(response) {
          console.log(response);
          var subCategories = response;
          var options = '';
          options+='<option disabled selected>select sub category</option>';
          $.each(subCategories, function(id, name) {
              options += '<option value="' + id + '">' + name + '</option>';
          });
          $('#sub-category').html(options);

        },
        error: function(xhr, status, error) {
          console.error(error);
        },

      });

    });
    //add new div color size
   var att_count=1;

$('#add_more_size_color').click(function(e){
    var size = $('#attr_1 #size-select').html();
    var color = $('#attr_1 #color-select').html();
    var offer = $('#attr_1 #offer-select').html();
    console.log(size);
    att_count++;
   var div_product_size_color = $('#div-product-size-color');
    var html_add_product_size =`
    <div class="row mt-2" id="att_${att_count}'">
    <div class="col-md-2 form-group">
    <label for="size-select">Size:</label>
    <select class="form-control" id="size-select-${att_count}" name="size-select[]">

    </select>
    </div>
    <div class="col-md-2 form-group">
    <label for="color-select">Color:</label>
    <select class="form-control" id="color-select-${att_count}" name="color-select[]">

    </select>
    </div>
    <div class="col-md-2 form-group">
    <label for="quantity-input">Quantity:</label>
    <input min="0" type="number" class="form-control" id="quantity-input-${att_count}" name="quantity-input[]">
    </div>
    <div class="col-md-2 form-group">
    <label for="price-input">Price:</label>
    <input min="0" type="number" class="form-control" id="price-input-${att_count}" name="price-input[]">
    </div>
    <div class="col-md-2 form-group">
    <label for="offer-select">Offer:</label>
    <select class="form-control" id="offer-select-${att_count}" name="offer-select[]">

    </select>
    </div>
    <div class="col-md-2 form-group mt-4">
    <button type="button" class="btn btn-danger text-dark" id="remove_more_size_color_${att_count}" > <i class="fi-rs-trash"></i></button>
    </div>
    </div>
    `;
   div_product_size_color.append(html_add_product_size);
   $('#size-select-'+att_count).html(size);
   $('#color-select-'+att_count).html(color);
   $('#offer-select-'+att_count).html(offer);

// remove btn size color

    $("#remove_more_size_color_"+att_count).click(function(e) {
        alert(att_count)
  $(this).closest('.row').remove();
});
});



    /*-------------------------------------------------------*/
    /*------------validation form paiment----------------*/

        $('#form-paiment').submit(function(event) {
          var cardNumber = $('#card_number').val();
          var expirationDate = $('#expiration_date').val();
          var cvc = $('#cvc').val();

          // Validate card number
          if (!cardNumber.match(/^[0-9]{16}$/)) {
            alert('Please enter a valid card number.');
            event.preventDefault();
            return false;
          }

          // Validate expiration date
          if (!expirationDate.match(/^(0[1-9]|1[0-2])\/[0-9]{2}$/)) {
            alert('Please enter a valid expiration date in the format MM/YY.');
            event.preventDefault();
            return false;
          }

          // Validate CVC
          if (!cvc.match(/^[0-9]{4}$/)) {
            alert('Please enter a valid CVC.');
            event.preventDefault();
            return false;
          }

          // If all validation passes, submit the form
          return true;
        });


    /*----------------------------------------------------*/

    /*---------------Send data(add panier) to database---*/
   const Panier = [];
    $('.check-to-add-panier').on('change',function(e){

        if ($(this).prop('checked')) {
            const num_product =$(this).closest('div').children('.number-of-product').val();
            console.log(num_product)
            const id_product= JSON.parse($(this).attr('data-product-id'));
             const size_product =JSON.parse($(this).attr('data-product-size'));
             const size_id =JSON.parse($(this).attr('data-size-id'));
            const color_product= JSON.parse($(this).attr('data-product-color'));
            const color_id= JSON.parse($(this).attr('data-color-id'));
             const price_product =JSON.parse($(this).attr('data-product-price'));
             const checkbox_id = $(this).attr('data-id');
             function generateId() {
                return Math.floor(Math.random() * 1000000);
              }
             add_to_panier={
                'id':generateId(),
                'checkbox_id': checkbox_id,
                 'quantity':num_product,
                 'id_product':id_product,
                 'size_product':size_product,
                 'size_id':size_id,
                 'color_product':color_product,
                 'color_id':color_id,
                 'price_product':price_product,
             }

            Panier.push(add_to_panier);

            console.log(Panier)

          }else{

            const checkbox_id = $(this).attr('data-id'); // get the unique identifier of the checkbox
            const index_to_remove = Panier.findIndex(item => item.checkbox_id === checkbox_id); // find the index of the object with the corresponding checkbox_id
            if (index_to_remove !== -1) {
              Panier.splice(index_to_remove, 1); // remove the object at the found index
            }
            console.log(Panier);
          }
    })
$('#add-to-panier').click(function(e){
     $.ajax({
          url: '/panier',
          method: 'GET',
          data: {
            panier: JSON.stringify(Panier)
          },
          success: function(response) {
            console.log(response);
             setTimeout(function(){
                // Redirect to /panier
                window.location.href = '/panier';
            }, 3000);
          },
          error: function(xhr, status, error) {
            console.error(error);
          }
        });

})

        /*--------------------------------------------------*/
/*-----------------drop panier li ----------*/
    $('.icon-delete-panier').click(function(e){
        $(this).closest('li').remove();
    })
/*--------------------------------------------------*/
/*--------add loading image in my website---------*/

    $("#loading").show();
    $("#loading").css('z-index',100);
    setTimeout(function() {
        $("#loading").hide();
    }, 1000);


/*-----------------end loading-------------*/
$('.product-img').slick({
    slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        loop: true,
        dots: false,
        arrows: true,
        prevArrow: '<span class="slider-btn slider-prev"><i class="fi-rs-angle-left" style="    color: red;font-size: 14px;font-weight: bold;"></i></span>',
        nextArrow: '<span class="slider-btn slider-next" style=" position: absolute !important;top: 0 !important;left: 90% !important; color: red;font-size: 14px; font-weight: bold;"><i class="fi-rs-angle-right"></i></span>',
        autoplay: true,
  });

    // "use strict";
    // // Page loading
    // $(window).on('load', function() {
    //     $('#preloader-active').delay(450).fadeOut('slow');
    //     $('body').delay(450).css({
    //         'overflow': 'visible'
    //     });
    //     $("#onloadModal").modal('show');
    // });
    /*------------update category----------*/

//     $('.edit-category').click(function(){


//         const input_id_category = $('#data-id-category-input');
//         const input_name_category = $('#name-category-input');
//         const select_sub_category = $('.select2-selection__rendered');

//         select_sub_category.empty();
//         const id_category = $(this).closest('tr').find('#id-category-table').text();
//         // console.log(id_category);
//         input_id_category.val(id_category);
//         // get url
//         var current_url = $('#form-add-category').attr('action');
//         $('#form-add-category').attr('action', `${current_url}/${id_category}`);


//         const name_category = $(this).closest('tr').find('#name-category-table').text();
//         // console.log(name_category);
//         input_name_category.val(name_category);
//         const sub_category = $(this).closest('tr').find('#sub-category-table li');

//         sub_category.each(function(){
//             select_sub_category.append($('<li>', {
//                 text: $(this).text(),
//                 value: $(this).attr('sub-cat-id-table')
//             }));
//         });
// /*--------------------------------------------------------------*/



//     })
    /*--------------FOrm of update information of user adress-phone-------*/
    // $('#form-change-info').submit(function(event) {

    //     event.preventDefault();

    //     $.ajax({
    //         type: $(this).attr('method'),
    //         url: $(this).attr('action'),
    //         data: $(this).serialize(),
    //         success: function(success) {
    //             // show alert success
    //             $('#sucess-error-update-info').html(`
    //             <div class="alert-success m-1 text-center">
    //             <div class="alert alert-success alert-dismissible fade show d-flex justify-content-between flex-wrap align-items-center" role="alert">
    //                <span>Success</span>
    //               </div>
    //         </div>
    //             `);
    //              // wait 2 seconds and refresh the page
    //              setTimeout(function(){
    //                 location.reload();
    //             },2000);
    //         },

    //         error: function(error) {
    //             // vider les div d'erreurs AND add class valid
    //             $('.inputs-valid').removeClass('is-invalid');
    //             $('.inputs-valid').addClass('is-valid');
    //             $('.inputs-error').html('');

    //             for (var key in error.responseJSON.errors) {
    //                 if (error.responseJSON.errors.hasOwnProperty(key)) {
    //                     // console.log(['responseJSON']['errors'][`${key}`])
    //                     var errorMessages = error.responseJSON.errors[key];
    //                     // $(`#${key}`).html(errorMessages)
    //                     for (var i = 0; i < errorMessages.length; i++) {
    //                         $(`[name="${key}"]`).addClass('is-invalid');
    //                         $(`#${key}-error`).html(errorMessages[i]);
    //                         // console.log(key + ': ' + errorMessages[i]);
    //                       }
    //                 }

    //             }

    //             // show alert error
    //             $('#sucess-error-update-info').html(`
    //             <div class="alert-success m-1 text-center">
    //             <div class="alert alert-danger alert-dismissible fade show d-flex justify-content-between flex-wrap align-items-center" role="alert">
    //                <span>Error</span>
    //               </div>
    //         </div>
    //             `);



    //         }
    //     });
    // });
    /*--------------FOrm of update compte email+name+password-------*/
    // $('#form-compte-info').submit(function(event) {

    //     event.preventDefault();

    //     $.ajax({
    //         type: $(this).attr('method'),
    //         url: $(this).attr('action'),
    //         data: $(this).serialize(),
    //         success: function(success) {
    //             console.log(success)
    //             // show alert success
    //             $('#sucess-error-update-info').html(`
    //             <div class="alert-success m-1 text-center">
    //             <div class="alert alert-success alert-dismissible fade show d-flex justify-content-between flex-wrap align-items-center" role="alert">
    //                <span>Success</span>
    //               </div>
    //         </div>
    //             `);
    //              // wait 2 seconds and refresh the page
    //              setTimeout(function(){
    //                 location.reload();
    //             },2000);
    //         },

    //         error: function(error) {
    //             // vider les div d'erreurs AND add class valid
    //             $('.inputs-valid-compte').removeClass('is-invalid');
    //             $('.inputs-valid-compte').addClass('is-valid');
    //             $('.inputs-error-compte').html('');

    //             for (var key in error.responseJSON.errors) {
    //                 if (error.responseJSON.errors.hasOwnProperty(key)) {
    //                     // console.log(['responseJSON']['errors'][`${key}`])
    //                     var errorMessages = error.responseJSON.errors[key];
    //                     // $(`#${key}`).html(errorMessages)
    //                     for (var i = 0; i < errorMessages.length; i++) {
    //                         $(`[name="${key}"]`).addClass('is-invalid');
    //                         $(`#${key}-error`).html(errorMessages[i]);
    //                         // console.log(key + ': ' + errorMessages[i]);
    //                       }
    //                 }

    //             }

    //             // show alert error
    //             $('#sucess-error-update-info').html(`
    //             <div class="alert-success m-1 text-center">
    //             <div class="alert alert-danger alert-dismissible fade show d-flex justify-content-between flex-wrap align-items-center" role="alert">
    //                <span>Error</span>
    //               </div>
    //         </div>
    //             `);



    //         }
    //     });
    // });


    /*-----------------
        Menu Stick
    -----------------*/
    var header = $('.sticky-bar');
    var win = $(window);
    win.on('scroll', function() {
        var scroll = win.scrollTop();
        if (scroll < 200) {
            header.removeClass('stick');
            $('.header-style-2 .categori-dropdown-active-large').removeClass('open');
            $('.header-style-2 .categori-button-active').removeClass('open');
        } else {
            header.addClass('stick');
        }
    });

    /*------ ScrollUp -------- */
    $.scrollUp({
        scrollText: '<i class="fi-rs-arrow-up"></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade'
    });

    /*------ Wow Active ----*/
    new WOW().init();

    //sidebar sticky
    if ($('.sticky-sidebar').length) {
        $('.sticky-sidebar').theiaStickySidebar();
    }

    // Slider Range JS
    if ( $("#slider-range").length ) {
        $("#slider-range").slider({
            range: true,
            min: 0,
            max: 500,
            values: [130, 250],
            slide: function (event, ui) {
                $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
            }
        });
        $("#amount").val("$" + $("#slider-range").slider("values", 0) +
            " - $" + $("#slider-range").slider("values", 1));
    }

    /*------ Hero slider 1 ----*/
    $('.hero-slider-1').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        speed:3000,
        fade: true,
        loop: true,
        dots: false,
        arrows: true,
        prevArrow: '<span class="slider-btn slider-prev"><i class="fi-rs-angle-left"></i></span>',
        nextArrow: '<span class="slider-btn slider-next"><i class="fi-rs-angle-right"></i></span>',
        appendArrows: '.hero-slider-1-arrow',
        autoplay: true,
    });

    /*Carausel 6 columns*/
    $(".carausel-6-columns").each(function(key, item) {
        var id=$(this).attr("id");
        var sliderID='#'+id;
        var appendArrowsClassName = '#'+id+'-arrows'

        $(sliderID).slick({
            dots: false,
            infinite: true,
            speed: 1000,
            arrows: true,
            autoplay: true,
            slidesToShow: 6,
            slidesToScroll: 1,
            loop: true,
            adaptiveHeight: true,
            responsive: [
                {
                    breakpoint: 1025,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }
            ],
            prevArrow: '<span class="slider-btn slider-prev"><i class="fi-rs-angle-left"></i></span>',
            nextArrow: '<span class="slider-btn slider-next"><i class="fi-rs-angle-right"></i></span>',
            appendArrows:  (appendArrowsClassName),
        });
    });

    /*Carausel 4 columns*/
    $(".carausel-4-columns").each(function(key, item) {
        var id=$(this).attr("id");
        var sliderID='#'+id;
        var appendArrowsClassName = '#'+id+'-arrows'

        $(sliderID).slick({
            dots: false,
            infinite: true,
            speed: 1000,
            arrows: true,
            autoplay: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            loop: true,
            adaptiveHeight: true,
            responsive: [
                {
                    breakpoint: 1025,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }
            ],
            prevArrow: '<span class="slider-btn slider-prev"><i class="fi-rs-angle-left"></i></span>',
            nextArrow: '<span class="slider-btn slider-next"><i class="fi-rs-angle-right"></i></span>',
            appendArrows:  (appendArrowsClassName),
        });
    });

    /*Fix Bootstrap 5 tab & slick slider*/

    $('button[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
		$('.carausel-4-columns').slick('setPosition');
	});

     /*------ Timer Countdown ----*/

    $('[data-countdown]').each(function() {
        var $this = $(this), finalDate = $(this).data('countdown');
        $this.countdown(finalDate, function(event) {
            $(this).html(
                event.strftime(''
                    + '<span class="countdown-section"><span class="countdown-amount hover-up">%d</span><span class="countdown-period"> days </span></span>'
                    + '<span class="countdown-section"><span class="countdown-amount hover-up">%H</span><span class="countdown-period"> hours </span></span>'
                    + '<span class="countdown-section"><span class="countdown-amount hover-up">%M</span><span class="countdown-period"> mins </span></span>'
                    + '<span class="countdown-section"><span class="countdown-amount hover-up">%S</span><span class="countdown-period"> sec </span></span>'
                )
            );
        });
    });

    /*------ Product slider active 1 ----*/
    $('.product-slider-active-1').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        fade: false,
        loop: true,
        dots: false,
        arrows: true,
        prevArrow: '<span class="pro-icon-1-prev"><i class="fi-rs-angle-small-left"></i></span>',
        nextArrow: '<span class="pro-icon-1-next"><i class="fi-rs-angle-small-right"></i></span>',
        responsive: [
            {
                breakpoint: 1199,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 575,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });

    /*------ Testimonial active 1 ----*/
    $('.testimonial-active-1').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        fade: false,
        loop: true,
        dots: false,
        arrows: true,
        prevArrow: '<span class="pro-icon-1-prev"><i class="fi-rs-angle-small-left"></i></span>',
        nextArrow: '<span class="pro-icon-1-next"><i class="fi-rs-angle-small-right"></i></span>',
        responsive: [
            {
                breakpoint: 1199,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 575,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });

    /*------ Testimonial active 3 ----*/
    $('.testimonial-active-3').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        fade: false,
        loop: true,
        dots: true,
        arrows: false,
        responsive: [
            {
                breakpoint: 1199,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 575,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });

    /*------ Categories slider 1 ----*/
    $('.categories-slider-1').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        fade: false,
        loop: true,
        dots: false,
        arrows: false,
        responsive: [
            {
                breakpoint: 1199,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 575,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });

    /*----------------------------
        Category toggle function
    ------------------------------*/
    var searchToggle = $('.categori-button-active');
    searchToggle.on('click', function(e){
        e.preventDefault();
        if($(this).hasClass('open')){
           $(this).removeClass('open');
           $(this).siblings('.categori-dropdown-active-large').removeClass('open');
        }else{
           $(this).addClass('open');
           $(this).siblings('.categori-dropdown-active-large').addClass('open');
        }
    })


    /*---------------------
        Price range
    --------------------- */
    // var sliderrange = $('#slider-range');
    // var amountprice = $('#amount');
    // $(function() {
    //     sliderrange.slider({
    //         range: true,
    //         min: 10,
    //         max: 1000,
    //         values: [10, 500],
    //         slide: function(event, ui) {
    //             amountprice.val("$" + ui.values[0] + " - $" + ui.values[1]);
    //         }
    //     });
    //     amountprice.val("$" + sliderrange.slider("values", 0) +
    //         " - $" + sliderrange.slider("values", 1));
    // });

    /*-------------------------------
        Sort by active
    -----------------------------------*/
    if ($('.sort-by-product-area').length) {
        var $body = $('body'),
            $cartWrap = $('.sort-by-product-area'),
            $cartContent = $cartWrap.find('.sort-by-dropdown');
        $cartWrap.on('click', '.sort-by-product-wrap', function(e) {
            e.preventDefault();
            var $this = $(this);
            if (!$this.parent().hasClass('show')) {
                $this.siblings('.sort-by-dropdown').addClass('show').parent().addClass('show');
            } else {
                $this.siblings('.sort-by-dropdown').removeClass('show').parent().removeClass('show');
            }
        });
        /*Close When Click Outside*/
        $body.on('click', function(e) {
            var $target = e.target;
            if (!$($target).is('.sort-by-product-area') && !$($target).parents().is('.sort-by-product-area') && $cartWrap.hasClass('show')) {
                $cartWrap.removeClass('show');
                $cartContent.removeClass('show');
            }
        });
    }

    /*-----------------------
        Shop filter active
    ------------------------- */
    $('.shop-filter-toogle').on('click', function(e) {
        e.preventDefault();
        $('.shop-product-fillter-header').slideToggle();
    })
    var shopFiltericon = $('.shop-filter-toogle');
    shopFiltericon.on('click', function() {
        $('.shop-filter-toogle').toggleClass('active');
    })

    /*-------------------------------------
        Product details big image slider
    ---------------------------------------*/
    $('.pro-dec-big-img-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        draggable: false,
        fade: false,
        asNavFor: '.product-dec-slider-small , .product-dec-slider-small-2',
    });

    /*---------------------------------------
        Product details small image slider
    -----------------------------------------*/
    $('.product-dec-slider-small').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.pro-dec-big-img-slider',
        dots: false,
        focusOnSelect: true,
        fade: false,
        arrows: false,
        responsive: [{
                breakpoint: 991,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 575,
                settings: {
                    slidesToShow: 2,
                }
            }
        ]
    });

    /*-----------------------
        Magnific Popup
    ------------------------*/
    $('.img-popup').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true
        }
    });
    /*-----------------
    select multi sub category
    ------------------------*/
    $('.select-sub-category').select2();

    /*---------------------
        Select active
    --------------------- */
    $('.select-active').select2();

    /*--- Checkout toggle function ----*/
    $('.checkout-click1').on('click', function(e) {
        e.preventDefault();
        $('.checkout-login-info').slideToggle(900);
    });

    /*--- Checkout toggle function ----*/
    $('.checkout-click3').on('click', function(e) {
        e.preventDefault();
        $('.checkout-login-info3').slideToggle(1000);
    });

    /*-------------------------
        Create an account toggle
    --------------------------*/
    $('.checkout-toggle2').on('click', function() {
        $('.open-toggle2').slideToggle(1000);
    });

    $('.checkout-toggle').on('click', function() {
        $('.open-toggle').slideToggle(1000);
    });


    /*-------------------------------------
        Checkout paymentMethod function
    ---------------------------------------*/
    paymentMethodChanged();
	function paymentMethodChanged() {
		var $order_review = $( '.payment-method' );

		$order_review.on( 'click', 'input[name="payment_method"]', function() {
			var selectedClass = 'payment-selected';
			var parent = $( this ).parents( '.sin-payment' ).first();
			parent.addClass( selectedClass ).siblings().removeClass( selectedClass );
		} );
	}

    /*---- CounterUp ----*/
    $('.count').counterUp({
        delay: 10,
        time: 2000
    });

    // Isotope active
    $('.grid').imagesLoaded(function() {
        // init Isotope
        var $grid = $('.grid').isotope({
            itemSelector: '.grid-item',
            percentPosition: true,
            layoutMode: 'masonry',
            masonry: {
                // use outer width of grid-sizer for columnWidth
                columnWidth: '.grid-item',
            }
        });
    });

    /*====== SidebarSearch ======*/
    function sidebarSearch() {
        var searchTrigger = $('.search-active'),
            endTriggersearch = $('.search-close'),
            container = $('.main-search-active');

        searchTrigger.on('click', function(e) {
            e.preventDefault();
            container.addClass('search-visible');
        });

        endTriggersearch.on('click', function() {
            container.removeClass('search-visible');
        });

    };
    sidebarSearch();

     /*====== Sidebar menu Active ======*/
    function mobileHeaderActive() {
        var navbarTrigger = $('.burger-icon'),
            endTrigger = $('.mobile-menu-close'),
            container = $('.mobile-header-active'),
            wrapper4 = $('body');

        wrapper4.prepend('<div class="body-overlay-1"></div>');

        navbarTrigger.on('click', function(e) {
            e.preventDefault();
            container.addClass('sidebar-visible');
            wrapper4.addClass('mobile-menu-active');
        });

        endTrigger.on('click', function() {
            container.removeClass('sidebar-visible');
            wrapper4.removeClass('mobile-menu-active');
        });

        $('.body-overlay-1').on('click', function() {
            container.removeClass('sidebar-visible');
            wrapper4.removeClass('mobile-menu-active');
        });
    };
    mobileHeaderActive();


   /*---------------------
        Mobile menu active
    ------------------------ */
    var $offCanvasNav = $('.mobile-menu'),
        $offCanvasNavSubMenu = $offCanvasNav.find('.dropdown');

    /*Add Toggle Button With Off Canvas Sub Menu*/
    $offCanvasNavSubMenu.parent().prepend('<span class="menu-expand"><i class="fi-rs-angle-small-down"></i></span>');

    /*Close Off Canvas Sub Menu*/
    $offCanvasNavSubMenu.slideUp();

    /*Category Sub Menu Toggle*/
    $offCanvasNav.on('click', 'li a, li .menu-expand', function(e) {
        var $this = $(this);
        if ( ($this.parent().attr('class').match(/\b(menu-item-has-children|has-children|has-sub-menu)\b/)) && ($this.attr('href') === '#' || $this.hasClass('menu-expand')) ) {
            e.preventDefault();
            if ($this.siblings('ul:visible').length){
                $this.parent('li').removeClass('active');
                $this.siblings('ul').slideUp();
            } else {
                $this.parent('li').addClass('active');
                $this.closest('li').siblings('li').removeClass('active').find('li').removeClass('active');
                $this.closest('li').siblings('li').find('ul:visible').slideUp();
                $this.siblings('ul').slideDown();
            }
        }
    });

    /*--- language currency active ----*/
    $('.mobile-language-active').on('click', function(e) {
        e.preventDefault();
        $('.lang-dropdown-active').slideToggle(900);
    });

    /*--- Categori-button-active-2 ----*/
    $('.categori-button-active-2').on('click', function(e) {
        e.preventDefault();
        $('.categori-dropdown-active-small').slideToggle(900);
    });

    /*--- Mobile demo active ----*/
    var demo = $('.tm-demo-options-wrapper');
    $('.view-demo-btn-active').on('click', function (e) {
        e.preventDefault();
        demo.toggleClass('demo-open');
    });

    /*-----More Menu Open----*/
    $('.more_slide_open').slideUp();
    $('.more_categories').on('click', function (){
        $(this).toggleClass('show');
        $('.more_slide_open').slideToggle();
    });

    /*-----Modal----*/

    $('.modal').on('shown.bs.modal', function (e) {
        $('.product-image-slider').slick('setPosition');
        $('.slider-nav-thumbnails').slick('setPosition');

        $('.product-image-slider .slick-active img').elevateZoom({
            zoomType: "inner",
            cursor: "crosshair",
            zoomWindowFadeIn: 500,
            zoomWindowFadeOut: 750
        });
    })

    /*--- VSticker ----*/
    $('#news-flash').vTicker({
        speed: 500,
        pause: 3000,
        animation: 'fade',
        mousePause: false,
        showItems: 1
    });

});

