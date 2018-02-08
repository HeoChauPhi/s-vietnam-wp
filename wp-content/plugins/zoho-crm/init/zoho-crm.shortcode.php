<?php
add_shortcode('zoho_wp_login_block', 'zoho_wp_login_block_render');
function zoho_wp_login_block_render($attrs) {
  extract(shortcode_atts (array(
  ), $attrs));

  ob_start();
    $args = array(
      'echo'           => true,
      'remember'       => true,
      'redirect'       => ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
      'form_id'        => 'loginform',
      'id_username'    => 'user_login',
      'id_password'    => 'user_pass',
      'id_remember'    => 'rememberme',
      'id_submit'      => 'wp-submit',
      'label_username' => __( 'Username or Email Address' ),
      'label_password' => __( 'Password' ),
      'label_remember' => __( 'Remember Me' ),
      'label_log_in'   => __( 'Log In' ),
      'value_username' => '',
      'value_remember' => false
    );

    if ( is_user_logged_in() == true ) {
      ?>
      <a href="<?php echo wp_logout_url( get_permalink() ); ?>">Logout</a>
      <?php
    } else {
      wp_login_form( $args );
      echo wp_register();
    }
  $content = ob_get_contents();
  ob_end_clean();
  return $content;
  wp_reset_postdata();
}

add_shortcode('zoho_wp_register_block', 'zoho_wp_register_block_render');
function zoho_wp_register_block_render($attrs) {
  extract(shortcode_atts (array(
  ), $attrs));

  ob_start();

    if ( is_user_logged_in() == true ) {
      ?>
      <a href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a>
      <?php
    } else {
      //wp_register();
    }

    wp_login_form( $args );
  $content = ob_get_contents();
  ob_end_clean();
  return $content;
  wp_reset_postdata();
}