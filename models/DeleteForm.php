<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 19.12.2018
 * Time: 10:25
 */
namespace app\models;

use yii\base\Model;

class DeleteForm extends Model
{
    public $title; // название события
    public $date_start;
    public $date_end;

    public function rules() //служебная ф-ция, содержит правила валидации атрибутов модели
    {
        return [
            [['title'],'required'],
            ['title','string','min'=>5],
            ['date_end','date'],
            ['date_start','date']
        ];
    }

    public function attributeLabels()
    {
        return [
            'title'=>'Заголовок события',
            'date_start'=>'Дата начала',
            'date_end'=>'Дата окончания'
        ];
    }
}