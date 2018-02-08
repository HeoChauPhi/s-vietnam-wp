(function($) {
  function checkRepassword() {
    //alert('ok');
    var form_register = $('#registerform');
    var input_password = form_register.find('.acf-field-password[data-name^="password"] input[type="password"]');
    var input_repassword = form_register.find('.acf-field-password[data-name$="_password"] input[type="password"]');
    var input_submit = form_register.find('.submit #wp-submit');

    input_repassword.after('<span class="re-password-status correct hidden">&#10004;</span>');
    input_repassword.after('<span class="re-password-status incorrect">&#10006;</span>');

    input_repassword.on('keyup', function() {
      var val_password = input_password.val();
      var val_repassword = $(this).val();
      var wrap_repassword = $(this).parent('.acf-input-wrap');
      if ( val_repassword === val_password ) {
        //alert(val_repassword.length);
        wrap_repassword.find('span.incorrect').addClass('hidden');
        wrap_repassword.find('span.correct').removeClass('hidden');
      } else {
        wrap_repassword.find('span.incorrect').removeClass('hidden');
        wrap_repassword.find('span.correct').addClass('hidden');
      }
    });

    input_password.on('keyup', function() {
      var val_repassword = input_repassword.val();
      var val_password = $(this).val();
      var wrap_repassword = input_repassword.parent('.acf-input-wrap');
      if ( val_repassword === val_password ) {
        //alert(val_repassword.length);
        wrap_repassword.find('span.incorrect').addClass('hidden');
        wrap_repassword.find('span.correct').removeClass('hidden');
      } else {
        wrap_repassword.find('span.incorrect').removeClass('hidden');
        wrap_repassword.find('span.correct').addClass('hidden');
      }
    });

    input_submit.on('click', function() {
      $('.error-message-pasword').remove();

      var val_password = input_password.val();
      var val_repassword = input_repassword.val();
      if ( val_repassword === val_password ) {
        if ( (val_password.length >= 6) ) {
          return true;
        } else {
          var wrap_password = input_password.parent('.acf-input-wrap');
          var wrap_repassword = input_repassword.parent('.acf-input-wrap');

          wrap_password.before('<div class="acf-error-message error-message-pasword"><p>Passwords are at least 6 characters long!</p></div>');
          wrap_repassword.before('<div class="acf-error-message error-message-pasword"><p>Re-Passwords are at least 6 characters long!</p></div>');

          return false;
        }
      } else {
        return false;
      }
    });
  }

  $(document).ready(function() {
    // Call to function
    checkRepassword();
  });

  $(window).load(function() {
    // Call to function
  });

  $(window).resize(function() {
    // Call to function
  });
})(jQuery);