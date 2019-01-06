<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 18.12.2018
 * Time: 21:01
 */
use yii\bootstrap\ActiveForm;

$this->title = "Новое событие или задание:";
?>
<h2><?=$this->title?></h2>
<div class="row">
    <div class = "col-md-6">
        <?php
        $form = ActiveForm::begin([
            'id' => 'create-form',
            'method' => 'POST'
        ]);
        ?>
        <?=$form->field($model,'day_id',['enableAjaxValidation'=>true]);?>
        <?=$form->field($model,'title',['enableAjaxValidation'=>true]);?>
        <?=$form->field($model,'body',['enableAjaxValidation'=>true]);?>

        <button class="btn btn-info" type="submit">Send</button>
        <?php ActiveForm::end();?>

    </div>

    <div class = "col-md-6">

        <?php if(\Yii::$app->request->post()) { ?>

            <h1>Название события: <?=$model->attributes['title']; ?></h1>

            <h3><?=$model->getAttributeLabel('body') ?>
                <div><?=$model['body'] ?></div></h3>

        <?php } ?>
    </div>
</div>