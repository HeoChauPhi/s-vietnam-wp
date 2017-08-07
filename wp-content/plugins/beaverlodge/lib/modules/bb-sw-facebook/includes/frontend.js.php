<?php

$pageName = $settings->pageName;
$AccountInfo = $settings->showAccountInfo;
$ImageCount = $settings->showImageCount;
$ImageText = $settings->showImageText;
$lightbox = $settings->lightbox;
$photosCheckbox = $settings->photosCheckbox;
$thumbnailSize = $settings->thumbnailSize;
$showComments = $settings->showComments;

$albums = $settings->excludeAlbums;

foreach ($albums as $album) {
    
     $excluded = '"' . $album . '",';
    
}

?>


(function($) {
    
	$(function() {

    $(".fb-preview-img-prev").attr("src","second.jpg");

       $(document).ready(function () {
          $(".fb-album-container").FacebookAlbumBrowser({
                account: "<?php echo $pageName; ?>",
                accessToken: "782659318506609|jLqIOS60rktQruMyG2Ao2Ncr9cY",
                skipAlbums: [<?php echo $excluded; ?>],
                showAccountInfo: <?php echo $AccountInfo; ?>,
                showImageCount: <?php echo $ImageCount; ?>,
                showImageText: <?php echo $ImageText; ?>,
                lightbox: <?php echo $lightbox; ?>,
                photosCheckbox: <?php echo $photosCheckbox; ?>,
                thumbnailSize: <?php echo $thumbnailSize; ?>,
                showComments: <?php echo $showComments; ?>,
            });
        });

	});

})(jQuery);

