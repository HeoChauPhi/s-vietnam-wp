
<div class="subscribe-me">
    
    <a href="#close" class="sb-close-btn">x</a>
    
    <?php if ($settings->content == 'mailchimp') { ?>
        <?php if (!empty($settings->url)) { ?>
			<form action="<?php echo $settings->url; ?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                
                <?php if (!empty($settings->image)) { ?>
                    <img src="<?php echo $settings->image_src ?>" class="sw-mc-img" />
                <?php };?>
                
                <div class="sb-heading"><?php echo $settings->heading; ?></div>
                <div class="sb-subtitle"><?php echo $settings->subtitle; ?></div>
                
                <div class="mc-field-group">
                    <input type="email" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Email Address">
                </div>
                
                <div id="mce-responses" class="clear">
                    <div class="response" id="mce-error-response" style="display:none"></div>
                    <div class="response" id="mce-success-response" style="display:none"></div>
                </div>	
                
                <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                
	       </form>
            <?php } ?>
           <?php } else {
                        echo $settings->html;
            } ?>
</div>