<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 11.01.2019
 * Time: 20:01
 */
?>
<div class="row">
    <div class = "col-md-12">
        <?=\yii\grid\GridView::widget(
            ['dataProvider'=>$provider]
        )?>
    </div>
</div>