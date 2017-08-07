.fl-node-<?php echo $id; ?> <?php echo $settings->tag; ?>.fl-heading {
	text-align: <?php echo $settings->d_alignment; ?>;
    <?php if($settings->border_position == 'side') : ?>
    padding: 0 <?php echo $settings->border_length; ?>px;
    <?php endif; ?>
    <?php if($settings->border_position == 'left') : ?>
    padding-right: <?php echo $settings->border_length; ?>px;
    <?php endif; ?>
    <?php if($settings->border_position == 'right') : ?>
    padding-right: <?php echo $settings->border_length; ?>px;
    <?php endif; ?>
	<?php if($settings->font_size == 'custom') : ?>
	font-size: <?php echo $settings->custom_font_size; ?>px;
	<?php endif; ?>
}

<?php if(!empty($settings->color)) : ?>
.fl-node-<?php echo $id; ?> <?php echo $settings->tag; ?>.fl-heading a,
.fl-node-<?php echo $id; ?> <?php echo $settings->tag; ?>.fl-heading .fl-heading-text,
.fl-node-<?php echo $id; ?> <?php echo $settings->tag; ?>.fl-heading .fl-heading-text * {
	color: #<?php echo $settings->color; ?>;
}
<?php endif; ?>

<?php if( !empty($settings->font) && $settings->font['family'] != 'Default' ) : ?>
.fl-node-<?php echo $id; ?> .fl-heading .fl-heading-text{
	<?php FLBuilderFonts::font_css( $settings->font ); ?>
}
<?php endif; ?>

<?php if($global_settings->responsive_enabled && ($settings->r_font_size == 'custom' || $settings->r_alignment == 'custom')) : ?>
@media (max-width: <?php echo $global_settings->responsive_breakpoint; ?>px) {
	
	<?php if($settings->r_font_size == 'custom') : ?>
	.fl-node-<?php echo $id; ?> <?php echo $settings->tag; ?>.fl-heading {
		font-size: <?php echo $settings->r_custom_font_size; ?>px;
	}
	<?php endif; ?>
	
	<?php if($settings->r_alignment == 'custom') : ?>
	.fl-node-<?php echo $id; ?> <?php echo $settings->tag; ?>.fl-heading {
		text-align: <?php echo $settings->r_custom_alignment; ?>;
	}
	<?php endif; ?>
}    
<?php endif; ?>

<?php if ($settings->show_border == 'yes') {
    
    if ($settings->border_position == 'side') { ?>
        .fl-node-<?php echo $id; ?> .fl-heading, .fl-node-<?php echo $id; ?> .fl-heading a{
        overflow: hidden;
        }

        .fl-node-<?php echo $id; ?> .fl-heading > .fl-heading-text, .fl-node-<?php echo $id; ?> .fl-heading a > .fl-heading-text{
        position: relative;
        display: inline-block;
        }

        <?php if ($settings->border_colour == 'custom') {
            $borderColor = '#' . $settings->border_color;
        } else {
            $borderColor = '';
        } ?>

        .fl-node-<?php echo $id; ?> .fl-heading > .fl-heading-text:before, .fl-node-<?php echo $id; ?> .fl-heading > .fl-heading-text:after, .fl-node-<?php echo $id; ?> .fl-heading a > .fl-heading-text:before, .fl-node-<?php echo $id; ?> .fl-heading a > .fl-heading-text:after{
        content: '';
        position: absolute;
        top: calc(50% - (<?php echo $settings->border_width; ?>px / 2) );
        border-bottom: <?php echo $settings->border_width; ?>px <?php echo $settings->border_style; ?> <?php echo $borderColor; ?>;
        width: <?php echo $settings->border_length; ?>px;
        margin: 0 <?php echo $settings->border_margin; ?>px;
        }

        .fl-node-<?php echo $id; ?> .fl-heading > .fl-heading-text:before, .fl-node-<?php echo $id; ?> .fl-heading a > .fl-heading-text:before{
        right: 100%;
        }

        .fl-node-<?php echo $id; ?> .fl-heading > .fl-heading-text:after, .fl-node-<?php echo $id; ?> .fl-heading a > .fl-heading-text:after{
        left: 100%;
        }

    <?php } // end side borders
    
    if ($settings->border_position == 'left') { ?>
        .fl-node-<?php echo $id; ?> .fl-heading, .fl-node-<?php echo $id; ?> .fl-heading a{
        overflow: hidden;
        }

        .fl-node-<?php echo $id; ?> .fl-heading > .fl-heading-text, .fl-node-<?php echo $id; ?> .fl-heading a > .fl-heading-text{
        position: relative;
        display: inline-block;
        }

        <?php if ($settings->border_colour == 'custom') {
            $borderColor = '#' . $settings->border_color;
        } else {
            $borderColor = '';
        } ?>

        .fl-node-<?php echo $id; ?> .fl-heading > .fl-heading-text:before, .fl-node-<?php echo $id; ?> .fl-heading a > .fl-heading-text:before {
        content: '';
        position: absolute;
        top: calc(50% - (<?php echo $settings->border_width; ?>px / 2) );
        border-bottom: <?php echo $settings->border_width; ?>px <?php echo $settings->border_style; ?> <?php echo $borderColor; ?>;
        width: <?php echo $settings->border_length; ?>px;
        margin: 0 <?php echo $settings->border_margin; ?>px;
        }

        .fl-node-<?php echo $id; ?> .fl-heading > .fl-heading-text:before, .fl-node-<?php echo $id; ?> .fl-heading a > .fl-heading-text:before{
        right: 100%;
        }

    <?php } // end left borders
    
    if ($settings->border_position == 'right') { ?>
        .fl-node-<?php echo $id; ?> .fl-heading, .fl-node-<?php echo $id; ?> .fl-heading a{
        overflow: hidden;
        }

        .fl-node-<?php echo $id; ?> .fl-heading > .fl-heading-text, .fl-node-<?php echo $id; ?> .fl-heading a > .fl-heading-text{
        position: relative;
        display: inline-block;
        }

        <?php if ($settings->border_colour == 'custom') {
            $borderColor = '#' . $settings->border_color;
        } else {
            $borderColor = '';
        } ?>

        .fl-node-<?php echo $id; ?> .fl-heading > .fl-heading-text:after, .fl-node-<?php echo $id; ?> .fl-heading a > .fl-heading-text:after{
        content: '';
        position: absolute;
        top: calc(50% - (<?php echo $settings->border_width; ?>px / 2) );
        border-bottom: <?php echo $settings->border_width; ?>px <?php echo $settings->border_style; ?> <?php echo $borderColor; ?>;
        width: <?php echo $settings->border_length; ?>px;
        margin: 0 <?php echo $settings->border_margin; ?>px;
        }

        .fl-node-<?php echo $id; ?> .fl-heading > .fl-heading-text:after, .fl-node-<?php echo $id; ?> .fl-heading a > .fl-heading-text:after{
        left: 100%;
        }

    <?php } // end right borders
    
    if ($settings->border_position == 'below') { ?>


        .fl-node-<?php echo $id; ?> .fl-heading > .fl-heading-text:after, .fl-node-<?php echo $id; ?> .fl-heading a > .fl-heading-text:after{
            content:' ';
            display:block;
            <?php if ($settings->border_colour == 'custom') {
                $borderColor = '#' . $settings->border_color;
            } else {
                $borderColor = '';
            } ?>
            border: <?php echo $settings->border_width; ?>px <?php echo $settings->border_style; ?> <?php echo $borderColor; ?>;
            width: <?php echo $settings->border_length; ?>px;
            margin-top: <?php echo $settings->border_margin; ?>px;
            <?php if ($settings->d_alignment == 'center') { ?>
            margin-left: auto;
            margin-right: auto;
            <?php } ?>
            <?php if ($settings->d_alignment == 'right') { ?>
            margin-left: calc(100% - <?php echo $settings->border_length; ?>px);
            <?php } ?>
        }

    <?php } // end below
    
    if ($settings->border_position == 'above') { ?>


        .fl-node-<?php echo $id; ?> .fl-heading > .fl-heading-text:before, .fl-node-<?php echo $id; ?> .fl-heading a > .fl-heading-text:before{
            content:' ';
            display:block;
            <?php if ($settings->border_colour == 'custom') {
                $borderColor = '#' . $settings->border_color;
            } else {
                $borderColor = '';
            } ?>
            border: <?php echo $settings->border_width; ?>px <?php echo $settings->border_style; ?> <?php echo $borderColor; ?>;
            width: <?php echo $settings->border_length; ?>px;
            margin-bottom: <?php echo $settings->border_margin; ?>px;
            <?php if ($settings->d_alignment == 'center') { ?>
            margin-left: auto;
            margin-right: auto;
            <?php } ?>
            <?php if ($settings->d_alignment == 'right') { ?>
            margin-left: calc(100% - <?php echo $settings->border_length; ?>px);
            <?php } ?>
        }

    <?php } // end below
    
}?>