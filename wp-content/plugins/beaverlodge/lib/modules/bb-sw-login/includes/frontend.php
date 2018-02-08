<div class="login-form">
    
    <?php

    $login  = (isset($_GET['login']) ) ? $_GET['login'] : 0;

    if ($settings->redirect == 'custom') {
        $redirect = $settings->url_redirect;
    } else if ($settings->redirect == 'home') {
        $redirect = get_home_url();
    } else {
        $redirect = wp_get_referer();
    }

    $args = array(
        'redirect' => $redirect,
        'id_username' => 'user',
        'id_password' => 'pass',
        'label_username' => $settings->label_username,
        'label_password' => $settings->label_password,
        'label_remember' => $settings->label_remember,
        'label_log_in' => $settings->label_login,
        'remember' => $settings->remember,
    );

    wp_login_form( $args );

    ?>
</div>