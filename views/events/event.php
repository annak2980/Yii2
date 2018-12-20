<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 18.12.2018
 * Time: 21:01
 */

$this->title = "Праздничный день";
?>
<h2><?=$this->title?></h2>
<div class="row">
    <div class = "col-md-6">
         //тут должна быть красивая картинка праздника
    </div>

    <div class = "col-md-6">
        <h1><?=$model->getAttributeLabel('title') ?> <?=$model['title']; ?></h1>
        <h3><?=$model->getAttributeLabel('date') ?>: <?=$model['date']?></h3>
        <h3><?=$model->getAttributeLabel('body') ?> <?=$model['body']?></h3>
    </div>
</div>