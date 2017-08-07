<?php 
if ($settings->sw_pdf_location != 'external' ) {
    $pdf = $settings->sw_pdf_file;
    $url = wp_get_attachment_url( $pdf );
} else {
    
    $url  = $settings->sw_pdf_url;    
}

$title = $settings->sw_pdf_title;
$height = $settings->sw_pdf_height;
$width = $settings->sw_pdf_width;
?>
<div class="sw-viewer">
    <h<?php echo $settings->sw_pdf_class; ?> class="sw-viewer-title"><?php echo $settings->sw_pdf_title; ?></h<?php echo $settings->sw_pdf_class; ?>>
    
    <iframe class="gdoc" src="//docs.google.com/gview?url=<?php echo $url; ?>&embedded=true" 
style="width:<?php echo $width; ?>px; height:<?php echo $height; ?>px;" frameborder="0"></iframe>
    
    <div class="clear"></div>
    <?php if ($settings->sw_pdf_download == 'no') { ?>
        <a class="sw-viewer-download" href="<?php echo $url; ?>">Download <?php echo $settings->sw_pdf_title; ?></a>
    <?php } ?>
    
</div>