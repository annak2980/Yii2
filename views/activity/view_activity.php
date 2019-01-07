<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 18.12.2018
 * Time: 21:01
 */
use yii\bootstrap\ActiveForm;

$this->title = "Просмотр и редактирование мероприятия:";
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

        <?=$form->field($model,'title',['enableAjaxValidation'=>true]);?>
        <?=$form->field($model,'date_start',['enableAjaxValidation'=>true])->
        widget(\yii\widgets\MaskedInput::class,['mask'=>"9999-99-99 99:99:99"])->textInput(['class'=>'form-control date_input']);?>
        <?=$form->field($model,'date_end',['enableAjaxValidation'=>true])->
        widget(\yii\widgets\MaskedInput::class,['mask'=>"9999-99-99 99:99:99"])->textInput(['class'=>'form-control date_input']);?>
        <?=$form->field($model,'address',['enableAjaxValidation'=>true,'enableClientValidation'=>false])->textinput();?>
        <?=$form->field($model,'body',['enableAjaxValidation'=>true]);?>
        <?=$form->field($model,'is_block')->checkbox(['class'=>'handler_input']);?>

        <button class="btn btn-info" type="submit">OK</button>
        <?php ActiveForm::end();?>

    </div>


</div>