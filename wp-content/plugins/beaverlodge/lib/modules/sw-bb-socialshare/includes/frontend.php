    <div class="element">
        
    <?php if ($settings->facebook == 'yes') { ?>    
        <div class="group facebook-share">
            <button class="fb"><i class="fa fa-facebook"></i><span class="name"> facebook</span></button>
        </div>
    <?php } ?>
        
    <?php if ($settings->google == 'yes') { ?>
        <div class="group gplus-share">
            <button class="gp"><i class="fa fa-google-plus"></i><span class="name"> google-plus</span></button>
        </div>
    <?php } ?>
        
    <?php if ($settings->linkedin == 'yes') { ?>
        <div class="group linkedin-share">
            <button class="linkedin"><i class="fa fa-linkedin"></i><span class="name"> linkedin</span></button>
        </div>
    <?php } ?>
        
    <?php if ($settings->twitter == 'yes') { ?>
        <div class="group twitter-share">
            <button class="twitter"><i class="fa fa-twitter"></i><span class="name"> twitter</span></button>
        </div>
    <?php } ?>
        
    <?php if ($settings->pinterest == 'yes') { ?>
        <div class="group pinterest-share">
            <button class="pinterest"><i class="fa fa-pinterest"></i><span class="name"> pinterest</span></button>
        </div>
    <?php } ?>
    </div>