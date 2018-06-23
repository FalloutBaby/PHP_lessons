<?php include 'header.php'; ?>
<hr><ul class='menu'>
    <?php foreach ($goods as $good) : ?>
        <li class='menu_list'>
            <a href='goods/show?id=<?= $good['goods_id'] ?>' class='item_prev_link' target='blank'><img src='<?= "../" . $good['img_adress'] ?>'><span><?= $good['title'] ?></span></a>
            <a href='goods/edit?id=<?= $good['goods_id'] ?>' class='edit'>✎</a>
            <a href='goods/delete?id=<?= $good['goods_id'] ?>' class='edit'>☒</a>
        </li>
    <?php endforeach; ?>
   </ul>
<a href='goods/add' class='navigation_link'>Добавить товар</a>