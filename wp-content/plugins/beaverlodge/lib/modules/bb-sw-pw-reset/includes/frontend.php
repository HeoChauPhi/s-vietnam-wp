<div class="wrapper">
    
    <?php
        global $wpdb;
        
        $error = '';
        $success = '';
        
  
        if( isset( $_POST['action'] ) && 'reset' == $_POST['action'] ) 
        {
            $email = trim($_POST['user_login']);
            
            if( empty( $email ) ) {
                $error = $settings->no_email;
            } else if( ! is_email( $email )) {
                $error = $settings->invalid_email;
            } else if( ! email_exists( $email ) ) {
                $error = $settings->non_email;
            } else {
                
                $random_password = wp_generate_password( 12, false );
                $user = get_user_by( 'email', $email );
                
                $update_user = wp_update_user( array (
                        'ID' => $user->ID, 
                        'user_pass' => $random_password
                    )
                );
                
                // if  update user return true then lets send user an email containing the new password
                if( $update_user ) {
                    $to = $email;
                    $subject = 'Your new password';
                    $sender = get_option('name');
                    
                    $message = 'Your new password is: '.$random_password;
                    
                    $headers[] = 'MIME-Version: 1.0' . "\r\n";
                    $headers[] = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                    $headers[] = "X-Mailer: PHP \r\n";
                    $headers[] = 'From: '.$sender.' < '.$email.'>' . "\r\n";
                    
                    $mail = wp_mail( $to, $subject, $message, $headers );
                    if( $mail )
                        $success = '<span>' . $settings->success_msg . '</span>';
                        
                } else {
                    $error = '<span>' . $settings->failed_msg . '</span>';
                }
                
            }
            
            if( ! empty( $error ) )
                echo '<div class="message"><p class="error"><strong>ERROR:</strong> '. $error .'</p></div>';
            
            if( ! empty( $success ) )
                echo '<div class="error_login"><p class="success">'. $success .'</p></div>';
        }
    ?>
 
    <!--html code-->
    <form method="post">
        <fieldset>
                <p><label for="user_login">E-mail:</label>
                <?php $user_login = isset( $_POST['user_login'] ) ? $_POST['user_login'] : ''; ?>
                <input type="text" name="user_login" id="user_login" value="<?php echo $user_login; ?>" /></p>
            <p>
                <input type="hidden" name="action" value="reset" />
                <input type="submit" value="Get New Password" class="button" id="submit" />
            </p>
        </fieldset> 
    </form>
</div>