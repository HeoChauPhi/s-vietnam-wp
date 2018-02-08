<?php 
$form = $settings->contact_form;
$form_name = get_the_title( $form );

echo do_shortcode('[contact-form-7 id="' . $form . '" title="'  . $form_name . '"]');

?>