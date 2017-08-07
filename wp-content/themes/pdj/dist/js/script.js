/*jslint browser: true*/
/*global $, jQuery, Modernizr, enquire, audiojs*/

(function($) {
  // Pagination Ajax.
  var pagination_ajax = function () {
    var parent_views = $(this).parents('.views');
    var name = parent_views.find('input[name="name"]').val();
    var post_type = parent_views.find('input[name="post_type"]').val();
    var per_page = parent_views.find('input[name="per_page"]').val();
    var cat_id = parent_views.find('input[name="cat_id"]').val();
    var custom_fields = parent_views.find('input[name="custom_fields"]').val();
    var use_pagination = parent_views.find('input[name="use_pagination"]').val();
    var paged_index = $(this).parent('li').attr('data-value');
    //alert(name);
    $(this).parents('ul.pager').find('> li').removeClass('current');
    $(this).parent('li').addClass('current');

    $.ajax({
      type : "post",
      dataType : "json",
      url : paginationAjax.ajaxurl,
      data : {action: "pagination", name: name, post_type: post_type, per_page: per_page, cat_id: cat_id, custom_fields: custom_fields, paged_index: paged_index, use_pagination: '' },
      beforeSend: function() {
        //parent_views.find('.load-views').empty();
        parent_views.find('.tool-pagination.ajax-pagination').before('<div class="ajax-load-icon">load items</div>');
      },
      success: function(response) {
        parent_views.find('.ajax_views').fadeOut("normal", function() {
          $(this).remove();
        });
        parent_views.find('.load-views').fadeOut("normal", function() {
          $(this).remove();
        });
        parent_views.find('.ajax-load-icon').fadeOut("normal", function() {
          $(this).remove();
        });
        parent_views.find('.tool-pagination.ajax-pagination').before('<div class="load-views"></div>');
        parent_views.find('.load-views').fadeIn("normal", function() {
          $(this).html(response.markup);
        });
        $("select").chosen();
        popupDownload();
      },
      error: function(response) {

      }
    });

    return false;

  };

  var js_toggle_menu = function () {
    var this_class = $(this).next('ul').attr('class').split(' ')[0];
    $('.js_toggle_menu').next('ul:not(.' + this_class + ')').slideUp();
    $(this).next('ul').slideToggle();
  }

  var menu_mobile = function () {
    $(this).toggleClass('fa-angle-down fa-angle-up');
    $(this).parent('a').next('ul.expanded-menu__menu-child').slideToggle();
    return false;
  }

  function jcarousel_slider($name, $item) {
    if ($item < 3) {
      $($name).slick({
        adaptiveHeight: true,
        arrows: false,
        dots: true,
        fade: true,
        infinite: true,
        slidesToShow: 1,
      });
    } else {
      $($name).slick({
        infinite: true,
        slidesToShow: $item,
        slidesToScroll: 1,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3
            }
          },
          {
            breakpoint: 892,
            settings: {
              slidesToShow: 2
            }
          },
          {
            breakpoint: 568,
            settings: {
              slidesToShow: 1
            }
          }
        ]
      });
    }
  }

  function slider_image_control() {
    $('.hero-banner-slider').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      fade: true,
      asNavFor: '.hero-banner-control',
      autoplay: true,
      autoplaySpeed: 2000,
    });
    $('.hero-banner-control').slick({
      slidesToShow: 5,
      slidesToScroll: 1,
      asNavFor: '.hero-banner-slider',
      dots: false,
      focusOnSelect: true,
      autoplay: true,
      autoplaySpeed: 2000,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 5
          }
        },
        {
          breakpoint: 892,
          settings: {
            slidesToShow: 3
          }
        },
        {
          breakpoint: 568,
          settings: {
            slidesToShow: 1
          }
        }
      ]
    });
  }

  function navigation_fixed() {
    var banner_height = $('.hero-banner-media').outerHeight(true);
    var header_height = $('#header').outerHeight(true);
    var scroll_match = banner_height - header_height;
    var scroll_top = $(window).scrollTop();

    if (scroll_top > scroll_match) {
      $('#header').addClass('header-fixed');
      $('.chatonline-label').addClass('chatonline-label-show');
    } else {
      $('#header').removeClass('header-fixed');
      $('.chatonline-label').removeClass('chatonline-label-show');
    }
  }
  
  var js_chatonline = function() {
    $('.block-chatonline').toggleClass('chatonline-show');
    $('.chatonline-action').delay( 200 ).toggleClass('fa-angle-up fa-angle-down');
    $(this).next('.fb-page').delay( 200 ).slideToggle();
  }

  function js_show_chatonline() {
    var scroll_top = $(window).scrollTop();

    if (scroll_top > 0) {
      $('.chatonline-label').addClass('chatonline-label-show');
    } else {
      $('.chatonline-label').removeClass('chatonline-label-show');
      $('.block-chatonline .fb-page').hide();
      $('.block-chatonline').removeClass('chatonline-show');
      $('.chatonline-action').removeClass('fa-angle-down').addClass('fa-angle-up');
    }
  }

  function daterange_picker() {
    $('.daterange_picker').each(function(){
      $(this).dateRangePicker({
        autoClose: true,
        separator : ' ',
        getValue: function() {
          if ($(this).find('.date-start').val() && $(this).find('.date-end').val() )
            return $(this).find('.date-start').val() + ' ' + $(this).find('.date-end').val();
          else
            return '';
        },
        setValue: function(s,s1,s2) {
          $(this).find('.date-start').val(s1);
          $(this).find('.date-end').val(s2);
        }
      });
    });
  }

  function js_select2() {
    $('.js-select2').select2({ width: '100%' });
  }

  function js_spinner() {
    $( ".js_spinner" ).spinner({
      max: 1000,
      min: 1,
      start: function( event, ui ) {
        if($(this).hasClass('js_spinner_zero')) {
          $(this).spinner({
            max: 1000,
            min: 0
          });
        }
      },
      stop: function( event, ui ) {
        var this_form_parent = $(this).parents('form');
        var this_parent = $(this).parents('.form-item');
        var this_var = $(this).val();

        this_parent.find('.form-alias > .form-count').text(this_var);

        if($(this).hasClass('hotel_childs')) {
          var child_age = this_parent.next('.form-item-childs-age').clone();
          var list_child_age = $('.hotel_childs_age_list > .form-item').length;
          var this_var_int = parseInt(this_var);

          if (((0 < this_var_int) && (list_child_age == 0)) || (this_var_int > list_child_age > 0)) {
            child_age.removeClass('form-item-childs-age hidden').addClass('form-item-childs-age-' + this_var).appendTo($('.hotel_childs_age_list'));  
            $('.form-item-childs-age-' + this_var).find('select.hotel_childs_age').attr('name', 'hotel_childs_age_' + this_var).prop("disabled", false);
            $('.form-item-childs-age-' + this_var).find('> label').append(' ' + this_var);
          } else if (this_var_int < list_child_age) {
            var this_child_age_item = this_var_int + 1;
            $('.form-item-childs-age-' + this_child_age_item.toString()).remove();
          }
        }

        if(this_form_parent.hasClass('form-hotel')) {
          var hotel_room = $('input.hotel_room').val();
          var hotel_extra_bed = $('input.hotel_extra_bed').val();
          var hotel_people = $('input.hotel_people').val();
          var hotel_childs = $('input.hotel_childs').val();
          var hotel_people_total = parseInt(hotel_people) + parseInt(hotel_childs);

          $('.hotel-order-alias .hotel_room').text(hotel_room);
          $('.hotel-order-alias .hotel_extra_bed').text(hotel_extra_bed);
          $('.hotel-order-alias .hotel_people').text(hotel_people_total.toString());
        }
      }
    });
  }

  var order_dropdown = function () {
    $(this).find('.form-dropdown-icon').toggleClass('fa-caret-down fa-caret-up');
    $(this).parent('.form-item').next('.form-dropdown').toggleClass('form-dropdown-show');
  }

  var video_slide = function () {
    var parent_item = $(this).parent('.block-video-item');
    var value_item = $(this).next('input').attr('attr-value');
    //alert(value_item);
    $('.block-video-item-action').empty().html(value_item);
  }

  var scroll_next_block = function () {
    var body = $("html, body");
    var banner_height = $('.hero-banner-media').outerHeight(true);
    body.animate({scrollTop: banner_height}, '500');
  }

  function booking_hotel() {
    $('input.quantity').on('click keyup', function(){
      var parent_quantity = $(this).parent('.booking-hotel');
      var quantity_total = parseInt($(this).val(), 10);
      var price = parseInt(parent_quantity.find('input.total').val(), 10);
      parent_quantity.find('input.net_total, input.grand_total').val(quantity_total * price);
    });

    $('input.booking').click(function() {
      var parent_booking = $(this).parent('.booking-hotel');
      var subject = parent_booking.find('input.subject.require').val();
      var subject_val = parent_booking.find('input.subject.require').attr('placeholder');
      if (subject == '') {
        parent_booking.find('.error').remove();
        parent_booking.append('<div class="error">' + subject_val + ' require!</div>');
        return false;
      } else {
        parent_booking.find('.error').remove();
        return true;
      }
    });
  }

  /* Functions Call */
  $(document).ready(function() {
    $('.ajax-pagination .pager-item a').on('click', pagination_ajax);
    $('.menu-item-has-children > a > .expanded-menu__button').on('click', menu_mobile);
    $('.js_toggle_menu').on('click', js_toggle_menu);
    $('.date-time-picker').datepicker();
    $('.js-quicktab').tabs();
    jcarousel_slider('.jcarousel-slider', 4);
    jcarousel_slider('.block-video-item-control', 3);
    jcarousel_slider('.jcarousel-slider-1-item', 1);
    $('.megamenu-tab').tabs({
      activate: function( event, ui ) {
        $('.jcarousel-slider').slick('setPosition');
        $('.js-select2').select2({ width: '100%' });
      }
    });
    navigation_fixed();
    $('.chatonline-label').on('click', js_chatonline);
    js_show_chatonline();
    daterange_picker();
    js_select2();
    js_spinner();
    $('.form-text-dropdown').on('click', order_dropdown);
    $('.block-video-thumbnail').on('click', video_slide);
    slider_image_control();
    $('.scroll-next-block .scroll-icon').on('click', scroll_next_block);
    booking_hotel();
  });

  $(window).load(function() {
    // Call to function
  });

  $(window).scroll(function() {
    // Call to function
    navigation_fixed();
    js_show_chatonline();
  });

  $(window).resize(function() {
    // Call to function
    navigation_fixed();
    js_show_chatonline();
  });

})(jQuery);