<?php 
$options = get_option( 'bl_gmap_settings' );

$custom_style = $options['bl_gmap_textarea_field_0'];

if ($settings->custom_center_marker == 'false') {
    $centermarkerimg = '//maps.google.com/mapfiles/ms/icons/red-dot.png';   
} else {
    $centermarkerimg = $settings->center_marker_src;   
}

if ($custom_style == '') {
    $custom_style = '[{"featureType":"landscape.man_made","elementType":"geometry","stylers":[{"color":"#f7f1df"}]},{"featureType":"landscape.natural","elementType":"geometry","stylers":[{"color":"#d0e3b4"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi.business","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.medical","elementType":"geometry","stylers":[{"color":"#fbd3da"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#bde6ab"}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffe15f"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#efd151"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"color":"black"}]},{"featureType":"transit.station.airport","elementType":"geometry.fill","stylers":[{"color":"#cfb2db"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#a2daf2"}]}]';
}
if ($settings->map_syle == 'desaturate') {
    $custom_style = '[{"featureType":"landscape","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","stylers":[{"saturation":-100},{"lightness":51},{"visibility":"simplified"}]},{"featureType":"road.highway","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"road.arterial","stylers":[{"saturation":-100},{"lightness":30},{"visibility":"on"}]},{"featureType":"road.local","stylers":[{"saturation":-100},{"lightness":40},{"visibility":"on"}]},{"featureType":"transit","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"administrative.province","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":-25},{"saturation":-100}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]}]';
}

if ($settings->map_syle == 'bluewater') {
    $custom_style = '[{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#46bcec"},{"visibility":"on"}]}]';
}

if ($settings->map_syle == 'icyblue') {
    $custom_style = '[{"stylers":[{"hue":"#2c3e50"},{"saturation":250}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":50},{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]}]';
}

if ($settings->map_syle == 'lakechelan') {
    $custom_style = '[{"featureType":"all","elementType":"all","stylers":[{"saturation":"0"}]},{"featureType":"administrative","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#9cd593"}]},{"featureType":"landscape.natural.landcover","elementType":"all","stylers":[{"saturation":"-5"},{"lightness":"-1"}]},{"featureType":"landscape.natural.landcover","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"landscape.natural.terrain","elementType":"all","stylers":[{"saturation":"-5"},{"visibility":"off"},{"lightness":"18"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.park","elementType":"all","stylers":[{"hue":"#9fff00"},{"saturation":"90"},{"lightness":"72"},{"visibility":"off"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"saturation":"91"},{"lightness":"-69"},{"weight":"1.06"},{"hue":"#00ff7e"}]},{"featureType":"poi.park","elementType":"geometry.stroke","stylers":[{"visibility":"on"},{"hue":"#00d0ff"}]},{"featureType":"poi.park","elementType":"labels.text","stylers":[{"visibility":"simplified"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":"2"},{"lightness":"20"},{"visibility":"on"},{"hue":"#0005ff"}]},{"featureType":"road","elementType":"labels.text","stylers":[{"visibility":"simplified"},{"hue":"#ff0000"},{"lightness":"-73"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#90bfe7"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"labels.text","stylers":[{"visibility":"simplified"},{"color":"#0005ff"}]},{"featureType":"road.highway","elementType":"labels.icon","stylers":[{"visibility":"on"}]},{"featureType":"road.arterial","elementType":"labels.text","stylers":[{"visibility":"simplified"},{"color":"#0005ff"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road.local","elementType":"all","stylers":[{"hue":"#0005ff"},{"saturation":"24"},{"lightness":"46"}]},{"featureType":"road.local","elementType":"labels","stylers":[{"visibility":"simplified"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#468bec"},{"visibility":"on"}]}]';
}

if ($settings->map_syle == 'redhat') {
    $custom_style = '[{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.business","elementType":"geometry.fill","stylers":[{"visibility":"on"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#b4d4e1"},{"visibility":"on"}]}]';
}

if ($settings->map_syle == 'routexl') {
    $custom_style = '[{"featureType":"administrative","elementType":"all","stylers":[{"visibility":"on"},{"saturation":-100},{"lightness":20}]},{"featureType":"road","elementType":"all","stylers":[{"visibility":"on"},{"saturation":-100},{"lightness":40}]},{"featureType":"water","elementType":"all","stylers":[{"visibility":"on"},{"saturation":-10},{"lightness":30}]},{"featureType":"landscape.man_made","elementType":"all","stylers":[{"visibility":"simplified"},{"saturation":-60},{"lightness":10}]},{"featureType":"landscape.natural","elementType":"all","stylers":[{"visibility":"simplified"},{"saturation":-60},{"lightness":60}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"},{"saturation":-100},{"lightness":60}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"},{"saturation":-100},{"lightness":60}]}]';
}

if ($settings->map_syle != 'default') {
    $map = '"custom"';
} else {
    $map = 'google.maps.MapTypeId.ROADMAP';  
}

$address = $settings->center_address;
$prepAddr = str_replace(' ','+',$address);
$geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false&libraries=places');
$output = json_decode($geocode);
$latitude = $output->results[0]->geometry->location->lat;
$longitude = $output->results[0]->geometry->location->lng;
        
$mainstr = nl2br($settings->center_description);
$mainstr = str_replace(array("\r","\n"), "", $mainstr);
$mainoutput = nl2br($mainstr);


if ($settings->drag == 'true') {
    $drag = 'isDraggable';
} else {
    $drag = 'false';
}

?>
(function($) {

	$(function() {
    var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
    var isDraggable = w > 480 ? true : false;
        $('.sw-gmap-<?php echo $id; ?>').gmap3({
        
  map:{
    options:{
        draggable: <?php echo $drag; ?>,
<?php if($settings->custom_center_option == 'false') { ?>
        center:[<?php echo $latitude; ?>,<?php echo $longitude; ?>],
<?php } else { ?>
        center:[<?php echo $settings->custom_center ?>],
<?php } ?>
        zoom: <?php echo $settings->zoom; ?>,
        scrollwheel: <?php echo $settings->scroll; ?>,
        mapTypeId: <?php echo $map; ?>,
        mapTypeControlOptions: {
           mapTypeIds: [google.maps.MapTypeId.ROADMAP, google.maps.MapTypeId.SATELLITE]
        }
    }
  },
    styledmaptype:{
      id: "custom",
      options:{
       
      },
      styles: <?php echo $custom_style; ?>
    },
  marker:{
    values:[
        {address:"<?php echo $settings->center_address; ?>", data:"<?php echo $mainoutput; ?>", options:{icon: "<?php echo $centermarkerimg; ?>"}},
      <?php 

    $addresses = $settings->address_fields;
    foreach ( $addresses as $address) {

        $location = $address->address;
        $secondstr = nl2br($address->description);
        $secondstr = str_replace(array("\r","\n"), "", $secondstr);
        $description = nl2br($secondstr);
        if ($address->custom_marker == 'true') {
            $marker = $address->marker_src;
        } else {
            $marker = '//maps.google.com/mapfiles/ms/icons/red-dot.png';
        }

        echo '{address:"'.$location.'", data:"'.$description.'", options:{icon: "'.$marker.'"}},';

    }?>
    ],
    events:{
      mouseover: function(marker, event, context){
        var map = $(this).gmap3("get"),
          infowindow = $(this).gmap3({get:{name:"infowindow"}});
        if (infowindow){
          infowindow.open(map, marker);
          infowindow.setContent(context.data);
        } else {
          $(this).gmap3({
            infowindow:{
              anchor:marker, 
              options:{content: context.data}
            }
          });
        }
      },
      mouseout: function(){
        var infowindow = $(this).gmap3({get:{name:"infowindow"}});
        if (infowindow){
          infowindow.close();
        }
      }
    }
  }
});


    var new_width =  $( ".sw-gmap-<?php echo $id; ?>" ).parent().width();
    $('.sw-gmap-<?php echo $id; ?>').width(new_width); 

	});

})(jQuery);