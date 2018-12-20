<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 19.12.2018
 * Time: 10:25
 */
namespace app\models;

use yii\base\Model;

class ActivityForm extends Model
{
    public $title; // название события
    public $date_start;
    public $date_end;
    public $date_created;
    public $id_author;
    public $body;
    public $email;
    public $is_blocked;

    public function rules() //служебная ф-ция, содержит правила валидации атрибутов модели
    {
        return [
            [['title',"email"],'required'],
            ['title','string','min'=>5],
            ['date_end','date'],
            ['date_start','date'],
            ['body','string','max'=>200],
            ['email','email'],
            ['is_blocked','string','max'=>1],
        ];
    }

    public function attributeLabels()
    {
        return [
            'title'=>'Заголовок события',
            'date_start'=>'Дата начала',
            'date_end'=>'Дата окончания',
            'id_author'=>'ID автора',
            'body'=>'Описание события',
            'email'=>'Email',
            'body'=>'Событие заблокировано'
        ];
    }
}