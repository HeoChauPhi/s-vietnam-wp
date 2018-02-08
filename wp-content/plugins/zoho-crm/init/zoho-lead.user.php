<?php
/*
 *
 *
 * User Register
 *
 */
function register_to_crm($url, $data, $optional_headers = null) {
  $params = array('http' => array(
              'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
              'method' => 'POST',
              'content' => http_build_query($data)
            ));
  if ($optional_headers !== null) {
    $params['http']['header'] = $optional_headers;
  }
  $ctx = stream_context_create($params);
  $fp = @fopen($url, 'rb', false, $ctx);
  if (!$fp) {
    throw new Exception("Problem with $url, $php_errormsg");
  }
  $response = @stream_get_contents($fp);
  if ($response === false) {
    throw new Exception("Problem reading data from $url, $php_errormsg");
  }
  return $response;
}

function zoholead_user_registration( $user_id ) {
  $zohocrm_author_token  = strrev($zohocrm_options['author_token']);
  $password = get_field('password', 'user_' . $user_id);
  if ( !empty( $password ) ) {
    wp_set_password( $password, $user_id );
  }

  $user_email = 'caothehai002@gmail.com';
  $user_first_name = 'Sale2';
  $user_last_name = 'S-VN';
  $user_sex = 'Female';
  $user_phone = '123654789';
  $user_address = 'Linh Nam, Ha Noi';
  $user_saltname = 'MR.';

  $url = 'https://crm.zoho.com/crm/private/xml/Leads/insertRecords';

  $data = array(
    'newFormat' => 1, 
    'authtoken' => $zohocrm_author_token,
    'scope' => 'crmapi',
    'xmlData' => '<Leads><row no="1"><FL val="Salutation">'.$user_saltname.'</FL><FL val="First Name">'.$user_first_name.'</FL><FL val="Last Name">'.$user_last_name.'</FL><FL val="Email">'.$user_email.'</FL><FL val="Sex">'.$user_sex.'</FL><FL val="Mobile">'.$user_phone.'</FL><FL val="Full Address">'.$user_address.'</FL></row></Leads>'
  );

  register_to_crm($url, $data);

  /*$user_email = $_REQUEST['user_email'];
  $user_first_name = get_field('first_name', 'user_' . $user_id);
  $user_last_name = get_field('last_name', 'user_' . $user_id);
  $user_sex = get_field('sex', 'user_' . $user_id)['label'];
  $user_phone = get_field('phone', 'user_' . $user_id);
  $user_address = get_field('address', 'user_' . $user_id);

  if ( $user_sex === 'Male' ) {
    $user_saltname = 'MR.';
  } else {
    $user_saltname = 'MS.';
  }

  $url = 'https://crm.zoho.com/crm/private/xml/Leads/insertRecords';
  $data = array(
    'newFormat' => 1, 
    'authtoken' => $zohocrm_author_token,
    'scope' => 'crmapi',
    'xmlData' => '<Leads><row no="1"><FL val="Salutation">'.$user_saltname.'</FL><FL val="First Name">'.$user_first_name.'</FL><FL val="Last Name">'.$user_last_name.'</FL><FL val="Email">'.$user_email.'</FL><FL val="Sex">'.$user_sex.'</FL><FL val="Mobile">'.$user_phone.'</FL><FL val="Full Address">'.$user_address.'</FL></row></Leads>'
  );

  // use key 'http' even if you send the request to https://...
  $options = array(
    'http' => array(
      'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
      'method'  => 'POST',
      'content' => http_build_query($data)
    )
  );
  $context  = stream_context_create($options);
  $result = file_get_contents($url, false, $context);
  if ($result === FALSE) { 
    echo 'FAIL'; 
  } else {
    echo '<div style="color: #46b450;">Profile updated to Zoho CRM!</div>';
  }
  //var_dump($result);*/
}
add_action( 'user_register', 'zoholead_user_registration', 10, 1 );

/*
 *
 *
 * User Update Profile
 *
 */

function zoholead_user_update_profile($profileuser) {
  $zohocrm_author_token  = strrev($zohocrm_options['author_token']);
  //print_r($_REQUEST);
  $user_id = get_current_user_id();
  $user_data = get_userdata($user_id);
  $user_role = $user_data->roles;

  if ( in_array('subscriber', $user_role) ) {
    if ( isset($_REQUEST['updated']) && ($_REQUEST['updated'] == 1) ) {
      $user_email = $user_data->data->user_email;
      $user_photo = get_field('photo', 'user_' . $user_id)['url'];
      $user_first_name = get_field('first_name', 'user_' . $user_id);
      $user_last_name = get_field('last_name', 'user_' . $user_id);
      $user_sex = get_field('sex', 'user_' . $user_id)['label'];
      $user_birthday = get_field('birthday', 'user_' . $user_id);
      $user_company_name = get_field('company_name', 'user_' . $user_id);
      $user_phone = get_field('phone', 'user_' . $user_id);
      $user_address = get_field('address', 'user_' . $user_id);
      $user_leadsid = get_field('leadsid', 'user_' . $user_id);

      if ( $user_sex === 'Male' ) {
        $user_saltname = 'MR.';
      } else {
        $user_saltname = 'MS.';
      }

      $url = 'https://crm.zoho.com/crm/private/xml/Leads/updateRecords';
      $data = array(
        'newFormat' => 1, 
        'authtoken' => $zohocrm_author_token,
        'scope' => 'crmapi',
        'id' => $user_leadsid,
        'xmlData' => '<Leads><row no="1"><FL val="Salutation">'.$user_saltname.'</FL><FL val="First Name">'.$user_first_name.'</FL><FL val="Last Name">'.$user_last_name.'</FL><FL val="Email">'.$user_email.'</FL><FL val="Sex">'.$user_sex.'</FL><FL val="Birthday">'.$user_birthday.'</FL><FL val="Company">'.$user_company_name.'</FL><FL val="Mobile">'.$user_phone.'</FL><FL val="Full Address">'.$user_address.'</FL></row></Leads>'
      );

      // use key 'http' even if you send the request to https://...
      $options = array(
        'http' => array(
          'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
          'method'  => 'POST',
          'content' => http_build_query($data)
        )
      );
      $context  = stream_context_create($options);
      $result = file_get_contents($url, false, $context);
      if ($result === FALSE) { 
        echo 'FAIL'; 
      } else {
        echo '<div style="color: #46b450;">Profile updated to Zoho CRM!</div>';
      }

      //var_dump($result);
    }
  }
}
add_action('show_user_profile', 'zoholead_user_update_profile', 10, 1);
add_action('edit_user_profile', 'zoholead_user_update_profile', 10, 1);
