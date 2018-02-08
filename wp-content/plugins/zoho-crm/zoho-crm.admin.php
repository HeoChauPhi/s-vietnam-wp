<?php
/**
 * Admin settings page.
 */

class ZohoCRMSettingsPage {
  /**
  * Holds the values to be used in the fields callbacks
  */
  private $options;

  /**
  * Start up
  */
  public function __construct() {
    add_action('admin_menu', array($this, 'add_plugin_page' ));
    add_action('admin_init', array($this, 'page_init'));
  }

  /**
  * Add options page
  */
  public function add_plugin_page() {
    // This page will be under "Settings"
    add_options_page(
      'Zoho CRM Board Settings',
      'Zoho CRM Board',
      'manage_options',
      'zoho-crm-setting-admin',
      array($this, 'create_admin_page')
    );
  }

  /**
  * Options page callback
  */
  public function create_admin_page() {
    // Set class property
    $this->options = get_option('zoho_crm_board_settings');

    ?>
    <div class="wrap">
      <h1><?php echo __('Zoho CRM Board Settings', 'zoho_crm'); ?></h1>
      <form method="post" action="options.php" class="zoho-crm-setting">
      <?php
        // This prints out all hidden setting fields
        settings_fields('zoho_crm_option_config');
        do_settings_sections('zoho-crm-setting-admin');
        submit_button();
      ?>
      </form>

      <?php if ( !empty($this->options['products_categories']) && $this->options['products_categories'] != null) : ?>
        <h2><?php echo __('Import and Remove ZohoCRM database', 'zoho_crm'); ?></h2>
        <?php include_once('init/zoho-crm.database.php'); ?>
      <?php endif; ?>

      <script type="text/javascript">
        (function($) {
          var key_up_input = function() {
            var attr_readonly = $(this).attr('readonly');
            if (attr_readonly == null) {
              if ($(this).val().length == 32) {
                var this_var = $(this).val().split('').reverse().join('');
                $(this).attr({'value': this_var, 'readonly': 'readonly'});
                $('.zoho-crm-setting input#submit').removeAttr('disabled');
              } else {
                $('.zoho-crm-setting input#submit').attr('disabled', 'disabled');
              }  
            }
          }

          function check_authortocken($form_tocken) {
            var author_token = $($form_tocken).val();
            var author_token_length = author_token.length;

            if (((author_token != '') && (author_token_length < 32)) || (author_token == '') || (author_token_length > 32)) {
              $('.zoho-crm-setting input#submit').attr('disabled', 'disabled');
            } else {
              $($form_tocken).attr('readonly', 'readonly');
            }
          }

          $(document).ready(function(){
            check_authortocken('.zoho-crm-setting #form-id-author_token');
            check_authortocken('.zoho-crm-setting #form-id-docs_author_token');
            check_authortocken('.zoho-crm-setting #form-id-invoice_author_token');

            $('.zoho-crm-setting .password-has-change').each(function(index){
              var this_input = $(this);

              $('.zoho-crm-setting input#submit').on('click', function(){
                var author_token_submit = this_input.val();
                var author_token_length_submit = author_token_submit.length;

                if (((author_token_submit != '') && (author_token_length_submit < 32)) || (author_token_submit == '') || (author_token_length_submit > 32)) {
                  this_input.css('border-color', 'red');
                  $(this).next('.meassage').remove();
                  $(this).after('<div class="meassage" style="color: red;"><?php echo __('Author Token need 32 characters.', 'zoho_crm'); ?></div>');
                  return false;
                } else {
                  return true;
                }
              });
            });

            $('.zoho-crm-setting .change-key').on('click', function() {
              $(this).prev('input.password-has-change').removeAttr('readonly');
              return false;
            });

            $('.zoho-crm-setting #form-id-author_token').keyup(key_up_input);
            $('.zoho-crm-setting #form-id-docs_author_token').keyup(key_up_input);
            $('.zoho-crm-setting #form-id-invoice_author_token').keyup(key_up_input);

            $( ".zoho-tabs-setting" ).tabs();
          });
        })(jQuery);
      </script>
    </div>
    <?php
  }

  /**
  * Register and add settings
  */
  public function page_init() {
    register_setting(
      'zoho_crm_option_config', 
      'zoho_crm_board_settings',
      array( $this, 'zoho_crm_sanitize' )
    );

    // Author Tocken
    add_settings_section(
      'setting_section_id', // ID
      __('Zoho API Setting', 'zoho_crm'), // Title
      array( $this, 'print_section_info' ), // Callback
      'zoho-crm-setting-admin' // Page
    );

    add_settings_field(
      'author_token',
      __('CRM Author Token:', 'zoho_crm'),
      array( $this, 'form_password' ), // Callback
      'zoho-crm-setting-admin', // Page
      'setting_section_id',
      'author_token'
    );

    add_settings_field(
      'docs_author_token',
      __('Docs Author Token:', 'zoho_crm'),
      array( $this, 'form_password' ), // Callback
      'zoho-crm-setting-admin', // Page
      'setting_section_id',
      'docs_author_token'
    );

    add_settings_field(
      'invoice_author_token',
      __('Invoice Author Token:', 'zoho_crm'),
      array( $this, 'form_password' ), // Callback
      'zoho-crm-setting-admin', // Page
      'setting_section_id',
      'invoice_author_token'
    );

    // Product Categories
    add_settings_section(
      'setting_section_products_categories', // ID
      __('Products Categories', 'zoho_crm'), // Title
      array( $this, 'print_section_info' ), // Callback
      'zoho-crm-setting-admin' // Page
    );

    add_settings_field(
      'products_categories',
      __('Products Categories:', 'zoho_crm'),
      array( $this, 'form_sortable' ), // Callback
      'zoho-crm-setting-admin', // Page
      'setting_section_products_categories',
      'products_categories'
    );
  }

  /**
   * Sanitize each setting field as needed
   *
   * @param array $input Contains all settings fields as array keys
   */
  public function zoho_crm_sanitize( $input ) {
    $new_input = array();

    if( isset( $input['author_token'] ) )
      $new_input['author_token'] = sanitize_text_field( $input['author_token'] );

    if( isset( $input['docs_author_token'] ) )
      $new_input['docs_author_token'] = sanitize_text_field( $input['docs_author_token'] );

    if( isset( $input['invoice_author_token'] ) )
      $new_input['invoice_author_token'] = sanitize_text_field( $input['invoice_author_token'] );

    if( isset( $input['products_categories'] ) )
      $new_input['products_categories'] = sanitize_text_field( $input['products_categories'] );

    return $new_input;
  }

  /**
  * Print the Section text
  */
  public function print_section_info() {
    echo "";
  }

  /**
  * Get the settings option array and print one of its values
  */
  public function form_textfield($name) {
    $value = isset($this->options[$name]) ? esc_attr($this->options[$name]) : '';
    printf('<input type="text" size=60 id="form-id-%s" name="zoho_crm_board_settings[%s]" value="%s" />', $name, $name, $value);
  }

  /**
  * Get the settings option array and print one of its values password field
  */
  public function form_password($name) {
    $value = isset($this->options[$name]) ? esc_attr($this->options[$name]) : '';
    printf('<input type="password" size=60 id="form-id-%s" name="zoho_crm_board_settings[%s]" value="%s" minlength=32 maxlength=32 class="password-has-change" /> <a class="change-key" href="#">%s</a>', $name, $name, $value, __('Change Author Token', 'zoho_crm'));
  }

  /**
  * Get the settings option array and print one of its values
  */
  public function form_sortable($name) { 
    $value = isset($this->options[$name]) ? esc_attr($this->options[$name]) : '';
    
    $zohocrm_product_active_arr = [];
    if ( !empty($value) && $value != '' ) {
      $zohocrm_product_active = explode('|', $value);
      foreach ($zohocrm_product_active as $type) {
        $type_arr = explode('=', $type);
        $zohocrm_product_active_arr[$type_arr[0]] = $type_arr[1];
      }
    }
    
    ?>
    <style type="text/css">
      .col-sortable {
        width: 35%;
        display: inline-block;
        vertical-align: top;
      }

      .form-sortable {
        min-height: 30px;
        background: #fff;
        padding: 5px;
      }

      .form-sortable li {
        cursor: move;
        padding: 5px;
      }

      .form-sortable li:last-of-type {
        margin-bottom: 0;
      }
    </style>

    <a href="#" class="zohocrm_getproducts_categories button"><?php echo __('Get Product categories from ZohoCRM', 'zoho_crm'); ?></a>
    <br>
    <br>

    <div class="col-sortable">
      <p><?php echo __('ZohoCRM Product Categories:', 'zoho_crm'); ?></p>
      <ul id="zohocrm-product-types" class="form-sortable">
      </ul>
    </div>

    <div class="col-sortable">
      <p><?php echo __('Website Posts type:', 'zoho_crm'); ?></p>
      <ul id="zohocrm-product-types-active" class="form-sortable">
        <?php
        if ( !empty($zohocrm_product_active_arr) && $zohocrm_product_active_arr != '' ) {
          foreach ($zohocrm_product_active_arr as $key => $type) {
            echo '<li data-value="' . $key . '" class="ui-state-default">' . $type . '</li>';
          }
        }
        ?>
      </ul>
    </div>
    <br>

    <script type="text/javascript">
      (function($) {
        function form_sortable() {
          $( "ul.form-sortable" ).sortable({
            connectWith: "ul.form-sortable",
            update: function( event, ui ) {
              var product_types = [];
              $("#zohocrm-product-types-active li").each(function() {
                var this_data_value = $(this).attr('data-value');
                var this_data_name = $(this).text();
                product_types.push(this_data_value + '=' + this_data_name);
              });
              $('.form-sortable-value').val(product_types.join("|"));
            }
          });
       
          $( "#zohocrm-product-types, #zohocrm-product-types-active" ).disableSelection();
        }

        $(document).ready(function(){
          form_sortable();

          $('.zohocrm_getproducts_categories').on('click', function() {
            $('ul#zohocrm-product-types').empty();
            $.ajax({
              type : "post",
              dataType : "json",
              url : ajaxurl,
              data : {
                action: "zohocrmGetProductsCategories"
              },
              beforeSend: function() {
                $('ul#zohocrm-product-types').append('<div class="zoho-ajax-loader"><span class="ajax-icon"></span></div>');
              },
              success: function(response) {
                //console.log(response.test);
                $('.zoho-ajax-loader').remove();
                $('ul#zohocrm-product-types').append(response.markup);
                form_sortable();
              },
              error: function(response) {
              }
            });

            return false;
          });
        });
      })(jQuery);
    </script>

    <?php
    printf('<input class="form-sortable-value" type="hidden" size=60 id="form-id-%s" name="zoho_crm_board_settings[%s]" value="%s" />', $name, $name, $value);
  }

  /**
  * Get the settings option array and print one of its values
  */
  public function form_textarea($name) {
    $value = isset($this->options[$name]) ? esc_attr($this->options[$name]) : '';
    printf('<textarea rows="4" class="large-text" id="form-id-%s" name="zoho_crm_board_settings[%s]">%s</textarea>', $name, $name, $value);
  }
}
