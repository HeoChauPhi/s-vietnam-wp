<ul class="fa-ul list-<?php echo $id; ?>">
    <?php 
    $items = $settings->list_items;
    foreach ($items as $item) {
    echo '<li><i class="fa-li ' . $item->icon;
        if ($item->class != '') {
            echo ' ' .$item->class;
        }
    echo '"></i>';
        if ($item->link != '') {
            echo '<a href="' . $item->link . '">' . $item->title . '</a>';
        } else {
            echo $item->title; 
        }
    echo '</li>';
    } 
    ?>
</ul>