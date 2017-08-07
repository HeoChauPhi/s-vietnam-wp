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

      <div class="zoho-tabs-setting">
        <ul>
          <li><a href="#zohocrm-import-content"><?php echo __('Zoho CRM import Content', 'zoho_crm'); ?></a></li>
          <li><a href="#zohocrm-delete-content"><?php echo __('Zoho CRM remove Content', 'zoho_crm'); ?></a></li>
        </ul>

        <div id="zohocrm-import-content">
          <h2><?php echo __('Zoho CRM import Content', 'zoho_crm'); ?></h2>
          <form method="post" action="#" id="zoho-crm-import">
            <p class="form-item">
              <textarea id="zohocrm_productid" name="zohocrm_productids" placeholder="One line for only one ID" rows="8" style="width: 100%;"></textarea></p>
            <p class="form-item">
              <select id="zohocrm_type" name="zohocrm_type">
                <option value="" checked>-- <?php echo __('Select Content Type', 'zoho_crm'); ?> --</option>
                <option value="hotel"><?php echo __('Hotel', 'zoho_crm'); ?></option>
                <option value="fly_ticket"><?php echo __('Fly Ticker', 'zoho_crm'); ?></option>
                <option value="tour"><?php echo __('Tour', 'zoho_crm'); ?></option>
              </select>
            </p>
            <p class="form-item">
              <button type="submit" form="zoho-crm-import" value="Submit" class="button button-primary">Submit</button>
            </p>
          </form>
          <?php
            if (!empty($GLOBALS['zohocrm_success'])) {
              echo '<div class="zohocrm-import-meassage">' . $GLOBALS['zohocrm_success'] . '</div>';
            }
          ?>
        </div>

        <div id="zohocrm-delete-content">
          <h2><?php echo __('Zoho CRM remove Content', 'zoho_crm'); ?></h2>
          <form method="post" action="#" id="zoho-crm-remove">
            <p class="form-item">
              <select id="zohocrm_posttype" name="zohocrm_posttype">
                <option value="" checked>-- <?php echo __('Select Content Type', 'zoho_crm'); ?> --</option>
                <option value="hotel|room"><?php echo __('Hotel', 'zoho_crm'); ?></option>
                <option value="fly_ticket"><?php echo __('Fly Ticker', 'zoho_crm'); ?></option>
                <option value="tour"><?php echo __('Tour', 'zoho_crm'); ?></option>
              </select>
            </p>
            <p class="form-item">
              <button type="submit" form="zoho-crm-remove" value="Submit" class="button button-primary">Submit</button>
            </p>
          </form>
        </div>
      </div>
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

          $(document).ready(function(){
            var author_token = $('.zoho-crm-setting #form-id-author_token').val();
            var author_token_length = author_token.length;

            if (((author_token != '') && (author_token_length < 32)) || (author_token == '') || (author_token_length > 32)) {
              $('.zoho-crm-setting input#submit').attr('disabled', 'disabled');
            } else {
              $('.zoho-crm-setting #form-id-author_token').attr('readonly', 'readonly');
            }

            $('.zoho-crm-setting input#submit').on('click', function(){
              var author_token_submit = $('#form-id-author_token').val();
              var author_token_length_submit = author_token_submit.length;
              if (((author_token_submit != '') && (author_token_length_submit < 32)) || (author_token_submit == '') || (author_token_length_submit > 32)) {
                $(this).next('.meassage').remove();
                $(this).after('<div class="meassage" style="color: red;"><?php echo __('Author Token need 32 characters.', 'zoho_crm'); ?></div>');
                return false;
              } else {
                return true;
              }
            });

            $('.zoho-crm-setting .change-key').on('click', function() {
              $('.zoho-crm-setting #form-id-author_token').removeAttr('readonly');
              return false;
            });

            $('.zoho-crm-setting #form-id-author_token').keyup(key_up_input);

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

    add_settings_section(
      'setting_section_id', // ID
      __('Zoho CRM Setting', 'zoho_crm'), // Title
      array( $this, 'print_section_info' ), // Callback
      'zoho-crm-setting-admin' // Page
    );

    add_settings_field(
      'author_token',
      'URL-token:',
      array( $this, 'form_password' ), // Callback
      'zoho-crm-setting-admin', // Page
      'setting_section_id',
      'author_token'
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
    printf('<input type="password" size=60 id="form-id-%s" name="zoho_crm_board_settings[%s]" value="%s" minlength=32 maxlength=32 /> <a class="change-key" href="#">%s</a>', $name, $name, $value, __('Change Author Token', 'zoho_crm'));
  }

  /**
  * Get the settings option array and print one of its values
  */
  public function form_textarea($name) {
    $value = isset($this->options[$name]) ? esc_attr($this->options[$name]) : '';
    printf('<textarea rows="4" class="large-text" id="form-id-%s" name="zoho_crm_board_settings[%s]">%s</textarea>', $name, $name, $value);
  }
}