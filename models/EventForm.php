<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 19.12.2018
 * Time: 10:25
 */
namespace app\models;

use yii\base\Model;

class EventForm extends Model
{
    public $title; // название праздника
    public $date;
    public $body;


    public function rules() //служебная ф-ция, содержит правила валидации атрибутов модели
    {
        return [
            [['title',"date"],'required'],
            ['title','string','min'=>5],
            ['body','string','max'=>200]
        ];
    }

    public function attributeLabels()
    {
        return [
            'title'=>'Название праздника',
            'date'=>'Праздничная дата',
            'body'=>'Описание праздника'
        ];
    }
}