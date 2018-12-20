<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 18.12.2018
 * Time: 21:01
 */
use yii\bootstrap\ActiveForm;

$this->title = "Новое событие:";
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

        <?=$form->field($model,'title');?>
        <?=$form->field($model,'date_start')->textInput(['class'=>'form-control date_input']);?>
        <?=$form->field($model,'date_end')->textInput(['class'=>'form-control date_input']);?>
        <?=$form->field($model,'email')->input('email');?>
        <?=$form->field($model,'body');?>
        <?=$form->field($model,'is_blocked')->textInput(['class'=>'handler_input']);?>

        <button class="btn btn-info" type="submit">Send</button>
        <?php ActiveForm::end();?>

    </div>

    <div class = "col-md-6">

        <?php if(\Yii::$app->request->post()) { ?>

            <h1>Название мероприятия: <?=$model->attributes['title']; ?></h1>

            <h3><?=$model->getAttributeLabel('email') ?>
            <div><?=$model['email'] ?></div></h3>

            <h3><?=$model->getAttributeLabel('body') ?>
            <div><?=$model['body'] ?></div></h3>

        <?php } ?>
    </div>
</div>