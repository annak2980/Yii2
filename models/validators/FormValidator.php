<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 26.12.2018
 * Time: 11:38
 */

class FormValidator extends \yii\validators\Validator

{
      public function validateAttribute($model, $attribute)
      {
          //parent::validateAttribute($model, $attribute); // TODO: Change the autogenerated stub
          if ($model->$attribute =='admin message') {
              $model->addError($attribute,'Название события недопустимо');
          }
      }
}