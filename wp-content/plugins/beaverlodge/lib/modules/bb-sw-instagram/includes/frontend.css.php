

.slider-content {
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    -webkit-flex-flow: row wrap;
    -moz-flex-flow: row wrap;
    -ms-flex-flow: row wrap;
    flex-flow: row wrap;
    justify-content: center;
}

<?php $width = $settings->instaSize; ?>
.slider-item {
    width: <?php echo $width; ?>px;
}

<?php if ($settings->instaHeader == 'no') { ?>
.slider-content header {
    display: none;
}
<?php } ?>

<?php if ($settings->instaMeta == 'no') { ?>
.slider-content .frame-title {
    display: none !important;
}
<?php } ?>

.slider-item {
    margin-left: <?php echo $settings->instaMarginLeft; ?>px;
    margin-right: <?php echo $settings->instaMarginRight; ?>px;
    margin-top: <?php echo $settings->instaMarginTop; ?>px;
    margin-bottom: <?php echo $settings->instaMarginBottom; ?>px;
}

<?php echo $settings->customCSS; ?>

.instaIcon {
    font-size: <?php echo $settings->instaIconSize; ?>px;
    margin: 0 20px;
}

.fl-node-<?php echo $id; ?> [class^="icon-"],
.fl-node-<?php echo $id; ?> [class*=" icon-"] {
  display: inline-block;
  text-decoration: inherit;
  vertical-align: middle;
  background-image: url('../img/icons.svg');
  background-repeat: no-repeat;
  width:16px;
  height: 16px;
  font-size: 0;
  color:transparent;
}
.fl-node-<?php echo $id; ?> [class^="icon-"].white,
.fl-node-<?php echo $id; ?> [class*=" icon-"].white{ background-image: url('../img/icons-white.svg');}
.icon-like {background-position: 0 0;}
.icon-comment {background-position: -16px 0;}
.icon-prev {background-position: -32px 0;}
.icon-next {background-position: -48px 0;}
