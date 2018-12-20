<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 18.12.2018
 * Time: 21:01
 */
use yii\bootstrap\ActiveForm;

$this->title = "Удалить событие:";
?>
<h2><?=$this->title?></h2>
<div class="row">
    <div class = "col-md-6">
        <?php
            $form = ActiveForm::begin([
                'id' => 'delete-form',
                'method' => 'POST'
            ]);
            ?>

        <h3><?= 'User ID'.(Yii::$app->user->id ? Yii::$app->user->id : ' не определен'); ?></h3><br>

        <?=$form->field($model,'title');?>
        <?=$form->field($model,'date_start')->textInput(['class'=>'form-control date_input']);?>
        <?=$form->field($model,'date_end')->textInput(['class'=>'form-control date_input']);?>

        <button class="btn btn-info" type="submit">Delete</button>
        <?php ActiveForm::end();?>

    </div>

    <div class = "col-md-6">

        <?php if(\Yii::$app->request->post()) { ?>

            <h1><?=$model['result']; ?></h1>
            <h1>Название события: <?=$model->attributes['title']; ?></h1>

        <?php } ?>
    </div>
</div>