<?php
$headerFamily = $settings->header_font; 
$rowFamily = $settings->row_font; 
?>
.tablesaw thead {
    background: #<?php echo $settings->headerBackground; ?>;
}
.tablesaw thead tr th {
<?php if($settings->header_font_size != 'default') { ?>
    font-size: <?php echo $settings->header_custom_font_size; ?>px;
<?php } ?>
    font-family: <?php echo $headerFamily[family]; ?> !important;
    font-weight: <?php echo $headerFamily[weight]; ?> !important;
    color: #<?php echo $settings->headerFont; ?>;
}

.tablesaw tbody tr {
    border-bottom: 1px solid #<?php echo $settings->rowsBorder; ?>;
}

.tablesaw thead tr:first-child th {
    border-right: 1px solid #<?php echo $settings->headerBorder; ?>;
}

.tablesaw tbody tr td {
<?php if($settings->header_font_size != 'default') { ?>
    font-size: <?php echo $settings->row_custom_font_size; ?>px;
<?php } ?>
    font-family: <?php echo $rowFamily[family]; ?> !important;
    font-weight: <?php echo $rowFamily[weight]; ?> !important;
    color: #<?php echo $settings->rowsFont; ?>;
}

.tablesaw .odd {
    background: #<?php echo $settings->rowsOddBackground; ?>;
    color: #<?php echo $settings->rowsFontOdd; ?>;
}

.tablesaw .even {
    background: #<?php echo $settings->rowsEvenBackground; ?>;
    color: #<?php echo $settings->rowsFontEven; ?>;
}

<?php echo $settings->customCSS; ?>