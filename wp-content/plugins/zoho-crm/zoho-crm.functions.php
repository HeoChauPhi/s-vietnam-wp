<?php
function vn_convert_to_en($str) {
  $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", "a", $str);
  $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", "e", $str);
  $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", "i", $str);
  $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", "o", $str);
  $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", "u", $str);
  $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", "y", $str);
  $str = preg_replace("/(đ)/", "d", $str);
  $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", "A", $str);
  $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", "E", $str);
  $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", "I", $str);
  $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", "O", $str);
  $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", "U", $str);
  $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", "Y", $str);
  $str = preg_replace("/(Đ)/", "D", $str);
  //$str = str_replace(" ", "-", str_replace("&*#39;","",$str));
  return $str;
}

function zohocrm_twig_data($data){
  $zohocrm_options = get_option('zoho_crm_board_settings');
  $zohocrm_author_token  = $zohocrm_options['author_token'];

  $data['zohocrm_author_token'] = strrev($zohocrm_author_token);

  return $data;
}

function zohocrm_replace_data($data) {
  $content_replace = [];

  foreach ($data as $value) {
    //$key_lower = strtolower($value->val);
    $key_replace = str_replace(' ', '_', $value->val);
    $key_convert = vn_convert_to_en($key_replace);
    $key_lower = strtolower($key_convert);

    $content_replace[$key_lower] = $value->content;
  }
  //print_r($content_replace);
  return $content_replace;
}