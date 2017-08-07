<?php

$maincolor = $settings->main_color;
$secondcolor = $settings->second_color;

?>

.cbp_tmtimeline {
	margin: 30px 0 0 0;
	padding: 0;
	list-style: none;
	position: relative;
} 

/* The line */
.cbp_tmtimeline:before {
	content: '';
	position: absolute;
	top: 0;
	bottom: 0;
	width: 10px;
	background: #<?php echo $maincolor; ?>;
	left: 20%;
	margin-left: -10px;
}

/* The date/time */
.cbp_tmtimeline > li .cbp_tmtime {
	display: block;
	width: 25%;
	padding-right: 100px;
	position: absolute;
}

.cbp_tmtimeline > li .cbp_tmtime span {
	display: block;
	text-align: <?php echo $settings->span_align; ?>;
}

.cbp_tmtimeline > li .cbp_tmtime span:first-child {
	color: #<?php echo $settings->date_font_color; ?>;
}

.cbp_tmtimeline > li .cbp_tmtime span:last-child {
	color: #<?php echo $secondcolor; ?>;
}

.cbp_tmtimeline > li:nth-child(odd) .cbp_tmtime span:last-child {
	color: #<?php echo $maincolor; ?>;
}

/* Right content */
.cbp_tmtimeline > li .cbp_tmlabel {
	margin: 0 0 15px 25%;
	background: #<?php echo $secondcolor; ?>;
	color: #<?php echo $settings->blurb_font_color; ?>;
	padding: 2em;
	font-weight: 300;
	line-height: 1.4;
	position: relative;
	border-radius: 5px;
}

.cbp_tmtimeline > li:nth-child(odd) .cbp_tmlabel {
	background: #<?php echo $maincolor; ?>;
}

<?php
$blurbcolor = '#' . $settings->blurb_font_color;
$blurbrgba = sw_vert_opacity($blurbcolor, '0.4');
?>
.cbp_tmtimeline > li .cbp_tmlabel h2 { 
	margin-top: 0px;
	padding: 0 0 10px 0;
	border-bottom: 1px solid <?php echo $blurbrgba; ?>;
}

/* The triangle */
.cbp_tmtimeline > li .cbp_tmlabel:after {
	right: 100%;
	border: solid transparent;
	content: " ";
	height: 0;
	width: 0;
	position: absolute;
	pointer-events: none;
	border-right-color: #<?php echo $secondcolor; ?>;
	border-width: 10px;
	top: 10px;
}

.cbp_tmtimeline > li:nth-child(odd) .cbp_tmlabel:after {
	border-right-color: #<?php echo $maincolor; ?>;
}

/* The icons */
.cbp_tmtimeline > li .cbp_tmicon {
	width: 40px;
	height: 40px;
	speak: none;
	font-style: normal;
	font-weight: normal;
	font-variant: normal;
	text-transform: none;
	font-size: 1.4em;
	line-height: 40px;
	-webkit-font-smoothing: antialiased;
	position: absolute;
	color: #<?php echo $settings->blurb_font_color; ?>;
	background: #<?php echo $secondcolor; ?>;
	border-radius: 50%;
	box-shadow: 0 0 0 8px #<?php echo $maincolor; ?>;
	text-align: center;
	left: 20%;
	margin: 0 0 0 -25px;
}


/* Example Media Queries */
@media screen and (max-width: 65.375em) {

	.cbp_tmtimeline > li .cbp_tmtime span:last-child {
		font-size: 1.5em;
	}
}

@media screen and (max-width: 47.2em) {
	.cbp_tmtimeline:before {
		display: none;
	}

	.cbp_tmtimeline > li .cbp_tmtime {
		width: 100%;
		position: relative;
		padding: 0 0 20px 0;
	}

	.cbp_tmtimeline > li .cbp_tmtime span {
		text-align: left;
	}

	.cbp_tmtimeline > li .cbp_tmlabel {
		margin: 0 0 30px 0;
		padding: 1em;
		font-weight: 400;
		font-size: 95%;
	}

	.cbp_tmtimeline > li .cbp_tmlabel:after {
		right: auto;
		left: 20px;
		border-right-color: transparent;
		border-bottom-color: #<?php echo $secondcolor; ?>;
		top: -20px;
	}

	.cbp_tmtimeline > li:nth-child(odd) .cbp_tmlabel:after {
		border-right-color: transparent;
		border-bottom-color: #<?php echo $maincolor; ?>;
	}

	.cbp_tmtimeline > li .cbp_tmicon {
		position: relative;
		float: right;
		left: auto;
		margin: -55px 5px 0 0px;
	}	
}

.spinner {
  margin: 100px auto 0;
  width: 70px;
  text-align: center;
}

.spinner > div {
  width: 18px;
  height: 18px;
  background-color: #333;

  border-radius: 100%;
  display: inline-block;
  -webkit-animation: sk-bouncedelay 1.4s infinite ease-in-out both;
  animation: sk-bouncedelay 1.4s infinite ease-in-out both;
}

.spinner .bounce1 {
  -webkit-animation-delay: -0.32s;
  animation-delay: -0.32s;
}

.spinner .bounce2 {
  -webkit-animation-delay: -0.16s;
  animation-delay: -0.16s;
}

@-webkit-keyframes sk-bouncedelay {
  0%, 80%, 100% { -webkit-transform: scale(0) }
  40% { -webkit-transform: scale(1.0) }
}

@keyframes sk-bouncedelay {
  0%, 80%, 100% { 
    -webkit-transform: scale(0);
    transform: scale(0);
  } 40% { 
    -webkit-transform: scale(1.0);
    transform: scale(1.0);
  }
}

.cbp_tmlabel p {
    font-size: <?php echo $settings->content_font; ?>px;
}

.the_title {
    color: #<?php echo $settings->blurb_font_color; ?>;
    font-size: <?php echo $settings->heading_font; ?>px;
}

.cbp_tmlabel a:hover {
    text-decoration: none;
    color: #<?php echo $settings->blurb_font_color; ?>;
}

.cbp_tmlabel a {
    text-decoration: none;
    color: #<?php echo $settings->blurb_font_color; ?>;
}

.time-span {
    font-size: <?php echo $settings->time_font; ?>px;
}
.date-span {
    font-size: <?php echo $settings->date_font; ?>px;
}

a.read-more:hover {
    color: #<?php echo $settings->button_font_color; ?>;
    background-color: #<?php echo $settings->button_bg_color; ?>;
}

ul.cbp_tmtimeline,
ul.cbp_tmtimeline li {
   list-style: none;
}

.cbp_tmtimeline .read-more {
    color: #<?php echo $settings->readmore_text_color; ?>;
    border: solid 1px #<?php echo $settings->readmore_border_color; ?>;
    border-radius: <?php echo $settings->readmore_border_radius; ?>px;
    padding: <?php echo $settings->readmore_top_padding; ?>px <?php echo $settings->readmore_side_padding; ?>px;
    margin: <?php echo $settings->readmore_top_margin; ?>px <?php echo $settings->readmore_side_margin; ?>px;
    transition: all 0.5s;
    background-color: #<?php echo $settings->readmore_bg_color; ?>;
}
.cbp_tmtimeline .read-more:hover {
    color: #<?php echo $settings->readmore_text_hover_color; ?>;
    border: solid 1px #<?php echo $settings->readmore_border_hover_color; ?>;
    border-radius: <?php echo $settings->readmore_border_radius; ?>px;
    padding: <?php echo $settings->readmore_top_padding; ?>px <?php echo $settings->readmore_side_padding; ?>px;
    margin: <?php echo $settings->readmore_top_margin; ?>px <?php echo $settings->readmore_side_margin; ?>px;
    transition: all 0.5s;
    background-color: #<?php echo $settings->readmore_bg_hover_color; ?>;
}