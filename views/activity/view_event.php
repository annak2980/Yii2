<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 18.12.2018
 * Time: 21:01
 */
use yii\bootstrap\ActiveForm;

$this->title = "Просмотр и редактирование события (задания):";
?>
<h2><?=$this->title?><?=$model['title']?></h2>
<div class="row">
    <div class = "col-md-6">
        <?php
        $form = ActiveForm::begin([
            'id' => 'view-form',
            'method' => 'POST'
        ]);
        ?>

        <?=$form->field($model,'day_id',['enableAjaxValidation'=>true]);?>
        <?=$form->field($model,'title',['enableAjaxValidation'=>true]);?>
        <?=$form->field($model,'body',['enableAjaxValidation'=>true]);?>

        <button class="btn btn-info" type="submit">OK</button>
        <?php ActiveForm::end();?>

    </div>

    <div class = "col-md-6">

    </div>
</div>