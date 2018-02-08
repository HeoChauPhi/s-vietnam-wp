jQuery(document).ready(function ($) {
  function format(state) {
    if (!state.id) return state.text; // optgroup
    return '<span class="acf-country-flag-icon famfamfam-flags '+ state.id.toLowerCase() +'"></span><span class="acf-country-flag-name">' + state.text + '</span>';
  }

  $('select.acf-country > option').each(function(){
    var op_value = $(this).val();
    //console.log(op_value);
    if (op_value.length > 0) {
      $(this).removeAttr('selected');
    } else {
      $(this).attr('selected', 'selected').text('Select a country');
    }
  });
  $('select.acf-country').select2({
    formatResult: format,
    formatSelection: format,
    escapeMarkup: function(m) { return m; }
  });
});
