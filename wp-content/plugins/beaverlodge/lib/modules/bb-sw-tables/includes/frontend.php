<?php
    $table = $settings->header;
    $tableheaders = $settings->header;
    $tablerows = $settings->rows;
    $tablelabel = $settings->rows;

if (!empty($table[0])) {
?>
<table class="tablesaw" <?php echo $settings->sortable; ?> data-tablesaw-mode="<?php echo $settings->scrollable; ?>" data-tablesaw-minimap>
    <thead>
        <tr>
            <?php $i = 0; foreach ( $tableheaders as $tableheader ) {
                echo '<th id="table-col-'.$i++.'" scope="col" data-tablesaw-sortable-col>';
                    echo $tableheader;
                echo '</th>';
            } $i = 0; ?>
        </tr>
    </thead>
    <tbody>
        <?php 
            if (!empty($tablerows[0])) {
                foreach ( $tablerows as $tablerow ) { 
                    $class = explode( ' ', $tablerow->label);
                        echo '<tr class=' . $class[0] . '>';
                            foreach ( $tablerow->cell as $tablecell ) {
                                echo '<td>' . $tablecell . '</td>';
                            }
                       echo '</tr>';
                } 
            }
        ?>
    </tbody>
</table>
<?php }