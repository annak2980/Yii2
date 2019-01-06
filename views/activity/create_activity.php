<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 18.12.2018
 * Time: 21:01
 */
use yii\bootstrap\ActiveForm;

$this->title = "Новое мероприятие:";
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

        <?=$form->field($model,'title',['enableAjaxValidation'=>true]);?>
        <?=$form->field($model,'date_start',['enableAjaxValidation'=>true])->
        widget(\yii\widgets\MaskedInput::class,['mask'=>"99.99.9999 99:99:99"])->textInput(['class'=>'form-control date_input']);?>
        <?=$form->field($model,'date_end',['enableAjaxValidation'=>true])->
        widget(\yii\widgets\MaskedInput::class,['mask'=>"99.99.9999 99:99:99"])->textInput(['class'=>'form-control date_input']);?>
       <?=$form->field($model,'email',['enableAjaxValidation'=>true,'enableClientValidation'=>false])->input('email');?>
        <?=$form->field($model,'address',['enableAjaxValidation'=>true,'enableClientValidation'=>false])->textinput();?>
<!--        <?//=$form->field($model,'password',['enableAjaxValidation'=>true])->passwordInput();?>
       <?//=$form->field($model,'password_repeat',['enableAjaxValidation'=>true])->passwordInput();?> -->
        <?=$form->field($model,'body',['enableAjaxValidation'=>true]);?>
        <?=$form->field($model,'is_block')->checkbox(['class'=>'handler_input']);?>

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