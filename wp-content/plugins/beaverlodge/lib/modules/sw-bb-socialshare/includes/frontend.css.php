<?php if ( $settings->stack =='block' && $settings->position == 'yes' ) { ?>
    
    .fl-module-bb-sw-socialshare-module {
    position: fixed;
    top: <?php echo $settings->top; ?>px;
    <?php echo $settings->float; ?>: 0;
}

<?php }

if ( $settings->labels == 'no' ) { ?>
    
    .element button { min-width: 60px; min-height: 60px; width: auto !important; }

<?php }

if ( $settings->labels && $settings->hover == 'no' ) { ?>
    
    .name { display: none; }

<?php }

if ( $settings->labels == 'no' && $settings->hover == 'yes' ) { ?>
    
    .fl-module-bb-sw-socialshare-module .name { display: none; transition: all 1s; -moz-transition: all 1s; -o-transition: all 1s; -webkit-transition: all 1s; }

    .facebook-share:hover .name, .gplus-share:hover .name, .linkedin-share:hover .name, .twitter-share:hover .name, .pinterest-share:hover .name {
    display: inline-block; margin-left: 5px; }

<?php }

if ( $settings->stack == 'inline-block') { ?>
    .element {
        text-align: <?php echo $settings->align; ?>;
    }
<?php } else { ?>
    .element {
        float: <?php echo $settings->float; ?>
    }
<?php } ?>

.element .group {
    display: <?php echo $settings->stack; ?>;
    position: relative;
    cursor: pointer;
    margin: 5px;
}

.element button {
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 2px;
    cursor: inherit;
    border: 0;
    color: #fff;
    width: 150px;
    outline: 0;
    font-family: inherit;
    transition: background-color .2s ease-in-out;
}

.fb {
    background-color: #306199;
}

.fb:hover {
    background-color: #244872;
}

.count {
    background-color: #fff;
    color: #565656;
    border-radius: 2px;
    margin-bottom: 10px;
    text-align: center;
    padding: 10px;
    height: 40px;
}

.fa-caret-down {
    position: absolute;
    margin-top: -22px;
    text-align: center;
    right: 10px;
    font-size: 28px;
}

.gp {
    background-color: #e93f2e;
}

.gp:hover {
    background-color: #ce2616;
}

.linkedin {
    background-color: #007bb6;
}

.linkedin:hover {
    background-color: #005983;
}

.twitter {
    background-color: #26c4f1;
}

.twitter:hover {
    background-color: #0eaad6;
}

.pinterest {
    background-color: #b81621;
}

.pinterest:hover {
    background-color: #8a1119;
}