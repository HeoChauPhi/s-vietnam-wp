.portfolio-navbar {
      list-style: none;
      margin: 0 0 6px 0;   
      background: #<?php echo $settings->bg_color; ?>;
      display: -webkit-box;
      display: -moz-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;  
      -webkit-flex-flow: row wrap;
      justify-content: <?php echo $settings->align; ?>
}

.portfolio-navbar a {
    text-decoration: none;
    color: #<?php echo $settings->font_color; ?>;
    padding: 15px;
    display: block;
    font-family: <?php echo $settings->font[family]; ?>;
    font-weight: <?php echo $settings->font[weight]; ?>;
    font-size: <?php echo $settings->font_size; ?>px;
}


.portfolio-navbar a:hover {
    background: #<?php echo $settings->bg_hover_color; ?>;
    color: #<?php echo $settings->font_hover_color; ?>;
}

@media all and (max-width: 800px) {
  .portfolio-navbar {
    justify-content: space-around;
  }
}

@media all and (max-width: 600px) {
  .portfolio-navbar {
    -webkit-flex-flow: column wrap;
    flex-flow: column wrap;
    padding: 0;
  }
  
  .portfolio-navbar a { 
    text-align: center; 
    padding: 10px;
    border-top: 1px solid rgba(255,255,255,0.3); 
    border-bottom: 1px solid rgba(0,0,0,0.1); 
  }

  
  .portfolio-navbar a:last-of-type a {
    border-bottom: none;
  }
}

.portfolio-gallery li {
    list-style: none;
    margin: <?php echo $settings->margin; ?>px;
}

.portfolio-gallery {
    overflow: hidden;
    list-style: none;
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}

.portfolio-gallery.hidden {
    display: none;
}
