/*jslint browser: true*/
/*global $, jQuery, Modernizr, enquire, audiojs*/

(function($) {
  // Social Field
  var ajax_load_field = function() {
    var parent = $(this).parents('.ajax_group');

    $.ajax({
      type : "post",
      dataType : "json",
      url : fieldsAjax.ajaxurl,
      data : {action: "ajaxloadfields", field_generate: '<p>this is field generate</p>'},
      beforeSend: function() {
      },
      success: function(response) {
      },
      error: function(response) {
      }
    });

    return false;
  };

  var addNewFields = function() {
    var parent = $(this).parents('.ajax_group');
    var item = parent.find('.ajax-list > .ajax-item');

    item.first().clone().appendTo(parent.find('.ajax-list'));

    var index_item = parent.find('.ajax-list > .ajax-item').length;
    if(index_item != 1) {
      parent.find('.ajax-action .ajax-remove').removeAttr('disabled');
    }

    return false;
  };

  var removeNewFields = function() {
    var parent = $(this).parents('.ajax_group');
    var item = parent.find('.ajax-list > .ajax-item');

    if(item.length > 1) {
      item.last().remove();
    }

    var index_item = parent.find('.ajax-list > .ajax-item').length;
    if(index_item == 1) {
      $(this).attr('disabled', 'disabled');
      return false;
    }

    return false;
  };
  // End Social Field

  $(document).ready(function() {
    // Call to function
    $('.ajax_group .ajax-add').on('click', addNewFields);
    $('.ajax_group .ajax-remove').on('click', removeNewFields);
  });

  $(window).load(function() {
    // Call to function
  });

  $(window).resize(function() {
    // Call to function
  });
})(jQuery);
