<?php
$address = $settings->center_address;
$addressTitle = (strstr($address, ',') ? substr($address, 0, strpos($address, ',')) : $address);
?>
<div class="sw-gmap sw-gmap-<?php echo $id; ?>"></div>
