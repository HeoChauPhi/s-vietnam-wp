/*jslint browser: true*/
/*global $, jQuery, Modernizr, enquire, audiojs*/

(function($) {
  var sidebar_filter = {
    "taxonomy": {},
    "custom_field": {"tour_price": "", "departure_day": "",}
  };

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

  var pageListPagination = function() {
    var this_pager = $(this);
    var parrent_list = $(this).parents('.list-page--content');
    var parrent_pager = $(this).parent();
    var offset = $(this).data('offset');
    var per_page = parrent_list.find('input[name="per_page"]').val();
    var page_post_type = parrent_list.find('input[name="page_post_type"]').val();
    var sort_layout = parrent_list.find('input[name="sort_layout"]').val();
    var sort_by_price = parrent_list.prev('.list-page--sort-view').find('select.sort-list-price').val();
    var date_val = $('.block-sidebar--tour_date input.date-time-picker-filter').val();

    if ( date_val != '' ) {
      var date_split = $('.block-sidebar--tour_date input.date-time-picker-filter').val().split("/");
      var tour_date = date_split[1] + "/" + date_split[0] + "/" + date_split[2];
    } else {
      var tour_date = '';
    }

    $.ajax({
      type : "post",
      dataType : "json",
      url : pdjCustomAjax.ajaxurl,
      data : {
        action: "pagelistpagination",
        data_sidebar_filter: sidebar_filter,
        page_post_type: page_post_type,
        per_page: per_page,
        offset: offset,
        sort_layout: sort_layout,
        tour_date: tour_date,
        sort_by_price: sort_by_price
      },
      beforeSend: function() {
        if ( parrent_pager.hasClass('active') == false ) {
          $('.block-sidebar--filter .block-content').append('<div class="ajax-loader"><i class="fa fa-spinner" aria-hidden="true"></i></div>');
          $('.list-page--sort-view').append('<div class="ajax-loader"><i class="fa fa-spinner" aria-hidden="true"></i></div>');
          parrent_list.find('.list-page--content-result').append('<div class="ajax-loader"><i class="fa fa-spinner" aria-hidden="true"></i></div>');
        }
      },
      success: function(response) {
        if ( parrent_pager.hasClass('active') == false ) {
          if ( sort_layout == 'grid' ) {
            var resulf_class = ' row';
          } else {
            var resulf_class = '';
          }
          parrent_list.find('.list-page--content-result').remove();
          $('.block-sidebar--filter .block-content .ajax-loader').remove();
          $('.list-page--sort-view .ajax-loader').remove();
          parrent_list.prepend('<div class="list-page--content-result' + resulf_class + '">' + response + '</div>');
          //console.log(response.markup_form);

          var pagination_total = parrent_list.find('.list-page--content-result input[name="pagination_total"]').val();
          var pagination_total_curent = $('.block-pagination .pagination li').length;

          if ( pagination_total == 1 ) {
            parrent_list.find('.block-pagination').remove();
          } else if ( pagination_total < pagination_total_curent ) {
            for (var i = pagination_total + 1; i < pagination_total_curent; i++) {
              $('.block-pagination .pagination li').eq(i - 1).remove();
            }
            $('.block-pagination .pagination li').removeClass('active');
            parrent_pager.addClass('active');
          } else {
            $('.block-pagination .pagination li').removeClass('active');
            parrent_pager.addClass('active');
          }

          $('.list-page--content-item .view-more').on('click', tour_list_view_more);
          $('.js-quicktab').tabs();
          $('.date-time-picker-ignore').datepicker({
            dateFormat: "dd/mm/yy",
            showOn: "button",
            buttonText: "Select date",
            minDate: "+10d",
            //maxDate: "+1d",
            beforeShowDay: function(day){
              var day = day.getDay();
              var day_str = $(this).data('showdate').toString();
              if ( day_str.search(day.toString()) == -1  ) {
                return [false, ""]
              } else {
                return [true, ""]
              }
            }
          });
          $("html, body").animate({ scrollTop: 0 }, "500");
        }
      },
      error: function(response) {

      }
    });

    return false;
  }

  /* Sidebar Filter  */
  var sidebar_filter_checkbox = function() {
    /*var sidebar_filter = {
      "taxonomy": {},
      "custom_field": {}
    };*/

    var data_value = $(this).data('value');

    $(this).toggleClass('active');
    $(this).find("> i.fa").toggleClass("fa-square-o fa-check-square-o");

    if ( $(this).data('tax') ) {
      var data_tax = $(this).data('tax');
      sidebar_filter["taxonomy"][data_tax].push(data_value);
    }

    if ( $(this).data('filter') ) {
      var data_filter = $(this).data('filter');
      sidebar_filter["custom_field"][data_filter].push(data_value);
    }

    //console.log(sidebar_filter);
  }

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
    var banner_height = $('.hero-banner-media').outerHeight();
    var header_height = $('#header').outerHeight();
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
        format: 'DD/MM/YYYY',
        separator: ' ',
        startDate: new Date(),
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

  function booking_scroll() {
    var block_booking_price = $('.block-booking-price');
    var booking_scroll_top = $(window).scrollTop();
    if ( block_booking_price.length ) {
      var block_booking_price_top = block_booking_price.offset().top;
      var block_booking_price_height = block_booking_price.outerHeight();
      var block_booking_price_scroll = block_booking_price_top + block_booking_price_height;
      if ( booking_scroll_top >= block_booking_price_scroll ) {
        block_booking_price.addClass('block-booking-price-fixed');
        block_booking_price.parent().css({'position': 'relative', 'top': block_booking_price_height});
      } else {
        block_booking_price.removeClass('block-booking-price-fixed');
        block_booking_price.parent().css({'top': 0});
      }
    }

    $(window).scroll(function() {
      var scroll_top = $(window).scrollTop();
      if ( scroll_top >= block_booking_price_scroll ) {
        block_booking_price.addClass('block-booking-price-fixed');
        block_booking_price.parent().css({'position': 'relative', 'top': block_booking_price_height});
      } else {
        block_booking_price.removeClass('block-booking-price-fixed');
        block_booking_price.parent().css({'top': 0});
      }
    });
  }

  var tour_list_view_more = function() {
    var parent_item = $(this).parent();
    $(this).toggleClass('view-more-close');
    $(this).find('.fa').toggleClass('fa-angle-down fa-times-circle-o');
    parent_item.find('.show-on-click').toggleClass('active');
  }

  // Tour Detail Date Time Picker
  function datePickerTour(date, instance) {
    var post_id = $("#sidebar-tour-booking input[name=tour-post-id]").val();
    var hotel_id = $("#sidebar-tour-booking input[name=tour-hotel-id]").val();

    if ( date != null ) {
      var date_split = date.split("/");
      var date_convert = date_split[1] + "/" + date_split[0] + "/" + date_split[2];
    } else {
      date_convert = null;
    }

    $.ajax({
      type: "post",
      dataType : "json",
      url: pdjCustomAjax.ajaxurl,
      data: {action: "price", date: date_convert, post_id: post_id, hotel_id: hotel_id},
      beforeSend: function() {
        $('.block-tour-price .block-content').append('<div class="ajax-loader"><i class="fa fa-spinner" aria-hidden="true"></i></div>');
        $('.block-tour-schedule .tour-schedule--hotels').append('<div class="ajax-loader"><i class="fa fa-spinner" aria-hidden="true"></i></div>');
      },
      success: function(response) {
        var markup_form = response.markup_form.replace(/\s/g, '');
        $('.block-tour-price .block-content .ajax-loader').remove();
        $('.block-tour-schedule .tour-schedule--hotels .ajax-loader').remove();
        $('.block-tour-price .tour-price .price-value .price-booking').text(markup_form);
        $("#sidebar-tour-booking input[name=tour-hotel-price]").val(markup_form.replace(/,/g,''));

        var markup_hotel = response.markup_hotel;
        console.log(markup_hotel);
        if ( markup_hotel.length > 0 ) {
          var markup_hotel_split = markup_hotel.split("|");
          for (i = 0; i < markup_hotel_split.length; i++) {
            var hotel_roh = markup_hotel_split[i].split("=");
            var room_id = hotel_roh[0];
            var room_roh = hotel_roh[1];

            if ( room_roh.length > 0 ) {
              $('.price-'+room_id+'-unit').show();
              $('.price-'+room_id).text(room_roh);
              $('.price-'+room_id).attr('data-price', room_roh.replace(/,/g,''));
            } else {
              $('.price-'+room_id+'-unit').hide();
              $('.price-'+room_id).text('Contact');
              $('.price-'+room_id).attr('data-price', 0);
            }
          }
        }
      },
      error: function(response) {

      }
    });
  }

  // Page List Date Time Picker
  function datePickerFilter(date, instance) {
    var parrent_list = $('.list-page--content');
    var sort_by_price = $('.list-page--sort-view select.sort-list-price').val();
    var per_page = parrent_list.find('input[name="per_page"]').val();
    var page_post_type = parrent_list.find('input[name="page_post_type"]').val();
    var sort_layout = parrent_list.find('input[name="sort_layout"]').val();

    if ( date != null ) {
      var date_split = date.split("/");
      var tour_date = date_split[1] + "/" + date_split[0] + "/" + date_split[2];
    } else {
      tour_date = null;
    }

    $.ajax({
      type: "post",
      dataType : "json",
      url: pdjCustomAjax.ajaxurl,
      data: {
        action: "sidebarfilter",
        tour_date: tour_date,
        sort_by_price: sort_by_price,
        per_page: per_page,
        page_post_type: page_post_type,
        sort_layout: sort_layout
      },
      beforeSend: function() {
        parrent_list.find('.list-page--content-result').append('<div class="ajax-loader"><i class="fa fa-spinner" aria-hidden="true"></i></div>');
      },
      success: function(response) {
        if ( sort_layout == 'grid' ) {
          var resulf_class = ' row';
        } else {
          var resulf_class = '';
        }
        parrent_list.find('.list-page--content-result').remove();
        parrent_list.prepend('<div class="list-page--content-result' + resulf_class + '">' + response.markup_form + '</div>');

        parrent_list.find('.block-pagination ul.pagination li.page-number').show();
        var pagination_total = parrent_list.find('.list-page--content-result input[name="pagination_total"]').val();
        var pagination_total_curent = $('.block-pagination .pagination li').length;

        if ( pagination_total == 1 ) {
          parrent_list.find('.block-pagination').hide();
        } else if ( 1 < pagination_total < pagination_total_curent ) {
          parrent_list.find('.block-pagination').show();
          for (i = parseInt(pagination_total) + 1; i <= parseInt(pagination_total_curent); i++) {
            $('.block-pagination .pagination li').eq(i - 1).hide();
          }
          parrent_list.find('.block-pagination ul.pagination li.page-number').removeClass('active');
          parrent_list.find('.block-pagination ul.pagination li.page-number-1').addClass('active');
        } else {
          parrent_list.find('.block-pagination').show();
          parrent_list.find('.block-pagination ul.pagination li.page-number').removeClass('active');
          parrent_list.find('.block-pagination ul.pagination li.page-number-1').addClass('active');
        }

        $('.list-page--content-item .view-more').on('click', tour_list_view_more);
        $('.js-quicktab').tabs();
        $('.date-time-picker-icon').datepicker({
          dateFormat: "dd/mm/yy",
          showOn: "button",
          buttonText: "Select date",
          minDate: "+10d"
        });
        $("html, body").animate({ scrollTop: 0 }, "500");
      },
      error: function(response) {

      }
    });
  }

  function sidebarFilterData(data) {
    var parrent_list = $('.list-page--content');
    var sort_by_price = $('.list-page--sort-view select.sort-list-price').val();
    var per_page = parrent_list.find('input[name="per_page"]').val();
    var page_post_type = parrent_list.find('input[name="page_post_type"]').val();
    var sort_layout = parrent_list.find('input[name="sort_layout"]').val();

    $.ajax({
      type: "post",
      dataType : "json",
      url: pdjCustomAjax.ajaxurl,
      data: {
        action: "filtertest",
        data_sidebar_filter: data,
        sort_by_price: sort_by_price,
        per_page: per_page,
        page_post_type: page_post_type,
        sort_layout: sort_layout
      },
      beforeSend: function() {
        /*$('#test-data').empty();
        $('#test-data').append('<div id="loading-test">Loading...</div>');*/
        $('.block-sidebar--filter .block-content').append('<div class="ajax-loader"><i class="fa fa-spinner" aria-hidden="true"></i></div>');
        $('.list-page--sort-view').append('<div class="ajax-loader"><i class="fa fa-spinner" aria-hidden="true"></i></div>');
        parrent_list.find('.list-page--content-result').append('<div class="ajax-loader"><i class="fa fa-spinner" aria-hidden="true"></i></div>');
      },
      success: function(response) {
        /*$("#loading-test").remove();
        $('#test-data').prepend(response);*/
        if ( sort_layout == 'grid' ) {
          var resulf_class = ' row';
        } else {
          var resulf_class = '';
        }
        parrent_list.find('.list-page--content-result').remove();
        $('.block-sidebar--filter .block-content .ajax-loader').remove();
        $('.list-page--sort-view .ajax-loader').remove();
        parrent_list.prepend('<div class="list-page--content-result' + resulf_class + '">' + response + '</div>');

        parrent_list.find('.block-pagination ul.pagination li.page-number').show();
        var pagination_total = parrent_list.find('.list-page--content-result input[name="pagination_total"]').val();
        var pagination_total_curent = $('.block-pagination .pagination li').length;

        if ( pagination_total == 1 ) {
          parrent_list.find('.block-pagination').hide();
        } else if ( 1 < pagination_total < pagination_total_curent ) {
          parrent_list.find('.block-pagination').show();
          for (i = parseInt(pagination_total) + 1; i <= parseInt(pagination_total_curent); i++) {
            $('.block-pagination .pagination li').eq(i - 1).hide();
          }
          parrent_list.find('.block-pagination ul.pagination li.page-number').removeClass('active');
          parrent_list.find('.block-pagination ul.pagination li.page-number-1').addClass('active');
        } else {
          parrent_list.find('.block-pagination').show();
          parrent_list.find('.block-pagination ul.pagination li.page-number').removeClass('active');
          parrent_list.find('.block-pagination ul.pagination li.page-number-1').addClass('active');
        }

        $('.list-page--content-item .view-more').on('click', tour_list_view_more);
        $('.js-quicktab').tabs();
        $('.date-time-picker-ignore').datepicker({
          dateFormat: "dd/mm/yy",
          showOn: "button",
          buttonText: "Select date",
          minDate: "+10d",
          //maxDate: "+1d",
          beforeShowDay: function(day){
            var day = day.getDay();
            var day_str = $(this).data('showdate').toString();
            if ( day_str.search(day.toString()) == -1  ) {
              return [false, ""]
            } else {
              return [true, ""]
            }
          }
        });
        $("html, body").animate({ scrollTop: 0 }, "500");
      },
      error: function(response) {
        console.log(response);
      }
    });
  }

  var clearDatePicker = function() {
    var date_picker = $(this).next("input[class*='date-time-picker']");
    var date_picker_val = date_picker.val();

    if ( date_picker_val != '' && date_picker_val != null ) {
      date_picker.datepicker('setDate', null);
      if ( date_picker.hasClass('date-time-picker-filter') ) {
        sidebar_filter['custom_field']['departure_day'] = null;
        //datePickerFilter(null);
        sidebarFilterData(sidebar_filter);
      }

      if ( date_picker.hasClass('date-time-picker-ignore') ) {
        datePickerTour(null);
      }
    }    
    
    return false;
  }

  /* Single Hotel */
  var tabScroll = function() {
    var body = $("html, body");
    var height_header = $('.header-fixed').outerHeight();
    var height_adminbar = $('#wpadminbar').outerHeight();
    var id_content = $(this).attr('href');
    var id_content_offset_top = $(id_content).offset().top;

    var body_scroll = id_content_offset_top - height_header - height_adminbar;

    body.animate({scrollTop: body_scroll}, '500');
    return false;
  }

  /* ===========================================================
   * ===========================================================
   * ===========================================================
   *                      FUNCTIONS CALL
   * ===========================================================
   * ===========================================================
   * ===========================================================
   */
  $(document).ready(function() {
    $('.ajax-pagination .pager-item a').on('click', pagination_ajax);
    $('.block-pagination .pagination li .pager-link').on('click', pageListPagination);
    $('.menu-item-has-children > a > .expanded-menu__button').on('click', menu_mobile);
    $('.js_toggle_menu').on('click', js_toggle_menu);
    $('.date-time-picker').datepicker();
    $('.date-time-picker-icon').datepicker({
      dateFormat: "dd/mm/yy",
      showOn: "button",
      buttonText: "Select date",
      minDate: new Date()
    });
    $('.date-time-picker-ignore').datepicker({
      dateFormat: "dd/mm/yy",
      showOn: "button",
      buttonText: "Select date",
      minDate: "+10d",
      //maxDate: "+1d",
      beforeShowDay: function(day){
        var day = day.getDay();
        var day_str = $(this).data('showdate').toString();
        if ( day_str.search(day.toString()) == -1  ) {
          return [false, ""]
        } else {
          return [true, ""]
        }
      },
      onSelect: function(date, instance) { datePickerTour(date, instance) }
    });

    $('.js-quicktab').tabs();
    $( '.js-accordion' ).accordion({
      active: false,
      collapsible: true ,
      heightStyle: "content"
    });
    $('.location-complete').geocomplete();
    if ( $('.jcarousel-slider').length > 0 ) {
      jcarousel_slider('.jcarousel-slider', 4);
    }

    if ( $('.block-video-item-control').length > 0 ) {
      jcarousel_slider('.block-video-item-control', 3);
    }

    if ( $('.jcarousel-slider-1-item').length > 0 ) {
      jcarousel_slider('.jcarousel-slider-1-item', 1);
    }

    if ( $('.jcarousel-slider-3-item').length > 0 ) {
      jcarousel_slider('.jcarousel-slider-3-item', 3);
    }

    $('.megamenu-tab').tabs({
      activate: function( event, ui ) {
        $('.jcarousel-slider').slick('setPosition');
        $('.js-select2').select2({ width: '100%' });
      }
    });
    $('.chatonline-label').on('click', js_chatonline);
    js_show_chatonline();
    daterange_picker();
    js_select2();
    js_spinner();
    $('.form-text-dropdown').on('click', order_dropdown);
    $('.block-video-thumbnail').on('click', video_slide);
    slider_image_control();
    $('.scroll-next-block .scroll-icon').on('click', scroll_next_block);
    //booking_hotel();
    /*$('.view-full-size').fancybox({
      padding:[0,0,0,0],
      wrapCSS:'video-full',
      beforeLoad: function(event) {
        console.log(event);
      }
    });*/
    $('.fancybox-image-gallery').fancybox({
      'hideOnContentClick': false,
      'showCloseButton' : true,
      'enableEscapeButton' : true,
      beforeLoad: function() {
        var content_id = $(this).attr("href");
        $(content_id).removeClass('hidden');
      },
      afterClose: function() {
        var content_id = $(this).attr("href");
        $(content_id).addClass('hidden');
      }
    });
    $('.fancybox-image-docs').fancybox({
      'hideOnContentClick': false,
      'showCloseButton' : true,
      'enableEscapeButton' : true,
      afterClose: function() {
        var content_id = $(this).attr("href");
        $(content_id).show();
      }
    });

    /* Page List */
    $('.list-page--content-item .view-more').on('click', tour_list_view_more);
    $('.list-page--sort-view .sort-list-view li').on('click', function() {
      var parent_sort = $(this).parent();
      var data_value = $(this).data('value');
      if ( data_value == 'grid' ) {
        $('.list-page--content-result').addClass('row');
        $('.list-page--content-result .list-page--content-item').addClass('col-lg-6 list-page--content-item-column');
      } else {
        $('.list-page--content-result').removeClass('row');
        $('.list-page--content-result .list-page--content-item').removeClass('col-lg-6 list-page--content-item-column');
      }

      $('.list-page--content input[name="sort_layout"]').val(data_value);
      parent_sort.find('li').removeClass('active');
      $(this).addClass('active');
    });
    $('select.sort-list-price').select2({ width: '100%' }).on('change', function() {
      sidebarFilterData(sidebar_filter);
    });

    $('.date-time-picker-filter').datepicker({
      dateFormat: "dd/mm/yy",
      showOn: "button",
      buttonText: "Select date",
      minDate: "+10d",
      //onSelect: function(date, instance) { datePickerFilter(date, instance) }
      onSelect: function(date, instance) {
        if ( date != null ) {
          var date_split = date.split("/");
          var tour_date = date_split[1] + "/" + date_split[0] + "/" + date_split[2];
        } else {
          tour_date = null;
        }

        sidebar_filter['custom_field']['departure_day'] = tour_date;

        sidebarFilterData(sidebar_filter);
      }
    });

    $('li.sidebar-filter').each(function(){
      //console.log($(this).data('value'));

      if ( $(this).data('tax') ) {
        var data_taxs = $(this).data('tax');
        sidebar_filter['taxonomy'][data_taxs] = '';
      }

      if ( $(this).data('filter') ) {
        var data_filters = $(this).data('filter');
        sidebar_filter['custom_field'][data_filters] = '';
      }
    });

    $('li.sidebar-filter').on("click", function(){
      var data_value = $(this).data('value');

      $(this).toggleClass('active');
      $(this).find("> i.fa").toggleClass("fa-square-o fa-check-square-o");

      if ( $(this).data('tax') ) {
        var data_tax = $(this).data('tax');
        if ( $(this).hasClass('active') ) {
          sidebar_filter["taxonomy"][data_tax] = sidebar_filter["taxonomy"][data_tax] + '|' + data_value;
        } else {
          sidebar_filter["taxonomy"][data_tax] = sidebar_filter["taxonomy"][data_tax].replace('|' + data_value, '');
        }
      }

      if ( $(this).data('filter') ) {
        var data_filter = $(this).data('filter');
        if ( $(this).hasClass('active') ) {
          sidebar_filter["custom_field"][data_filter] = sidebar_filter["custom_field"][data_filter] + '|' + data_value;
        } else {
          sidebar_filter["custom_field"][data_filter] = sidebar_filter["custom_field"][data_filter].replace('|' + data_value, '');
        }
      }

      sidebarFilterData(sidebar_filter);
    });

    $('.date-time-picker-clear').on('click', clearDatePicker);

    // Sidebar Price Ranger
    if ( $( ".sidebar--price-filter-slider-range" ).length != '' && $( ".sidebar--price-filter-slider-range" ).length != null ) {
      var max_price = $( ".sidebar--price-filter-slider-range" ).data('max-value');

      $( ".sidebar--price-filter-slider-range" ).slider({
        range: true,
        step: 10000,
        min: 0,
        max: max_price,
        values: [ 0, max_price ],
        slide: function( event, ui ) {
          $( ".sidebar--price-filter-amount" ).text( "VNĐ " + $.number(ui.values[ 0 ]) + " - VNĐ " + $.number(ui.values[ 1 ]) );
          $( ".price-filter" ).val( ui.values[ 0 ] + "," + ui.values[ 1 ] );
        },
        stop: function( event, ui ) {
          sidebar_filter['custom_field']['tour_price'] = ui.values[ 0 ] + "," + ui.values[ 1 ];

          sidebarFilterData(sidebar_filter);
        }
      });

      $('.sidebar--price-filter-clear').on('click', function(){
        //alert('ok');
        var block_parent = $(this).parents('.block-sidebar--price-filter');
        var price_filter = block_parent.find('.sidebar--price-filter-slider-range');
        if ( price_filter.slider( "values", 0 ) != 0 || price_filter.slider( "values", 1 ) != max_price ) {
          price_filter.slider("destroy");
          price_filter.slider({
            range: true,
            step: 10000,
            min: 0,
            max: max_price,
            values: [ 0, max_price ],
            create: function( event, ui ) {
              sidebar_filter['custom_field']['tour_price'] = "";
              $( ".sidebar--price-filter-amount" ).text( "VNĐ " + $.number(0) + " - VNĐ " + $.number(max_price) );
              $( ".price-filter" ).val( "0," + max_price );

              sidebarFilterData(sidebar_filter);
            },
            slide: function( event, ui ) {
              $( ".sidebar--price-filter-amount" ).text( "VNĐ " + $.number(ui.values[ 0 ]) + " - VNĐ " + $.number(ui.values[ 1 ]) );
              $( ".price-filter" ).val( ui.values[ 0 ] + "," + ui.values[ 1 ] );
            },
            stop: function( event, ui ) {
              sidebar_filter['custom_field']['tour_price'] = ui.values[ 0 ] + "," + ui.values[ 1 ];

              sidebarFilterData(sidebar_filter);
            }
          });
        }
        
        return false;
      });

      $( ".sidebar--price-filter-amount" ).text( "VNĐ " + $.number($( ".sidebar--price-filter-slider-range" ).slider( "values", 0 )) + " - VNĐ " + $.number($( ".sidebar--price-filter-slider-range" ).slider( "values", 1 )) );
    }

    $('.sidebar-filter-clear').on('click', function(){
      var term_list = $(this).next('ul').find('li');
      var term_data_filter = term_list.data('filter');
      var term_data_tax = term_list.data('tax');

      if ( term_list.hasClass('active') ) {
        term_list.removeClass('active');
        term_list.find("> i.fa").removeClass("fa-check-square-o");
        term_list.find("> i.fa").addClass("fa-square-o");

        if ( term_data_filter ) {
          sidebar_filter['custom_field'][term_data_filter] = "";
        }

        if ( term_data_tax ) {
          sidebar_filter['taxonomy'][term_data_tax] = "";
        }
        console.log(sidebar_filter);
        sidebarFilterData(sidebar_filter);
      }

      return false;
    });

    /*var str_test = '1;3;4;5;6';
    var str_search = '5';
    console.log(str_test.search(str_search));*/

    /* Single Hotel call Functions */
    $('.main-single-tabs a').on('click', tabScroll);
  });

  $(window).load(function() {
    // Call to function
    navigation_fixed();
    booking_scroll();
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
