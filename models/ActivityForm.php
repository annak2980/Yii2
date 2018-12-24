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
    public $result;
    public $is_blocked;
    public $is_twin;

    ///////////////////registration
    public $login;
    public $user_name;
    public $password;
    public $password_repeat;
    public $accept_process_data;

    public function rules() //служебная ф-ция, содержит правила валидации атрибутов модели
    {
        return [

            ['title','required'],

            [['title','body'],'trim'],               // убирает ненужны пробелы сбоку
            ['body','string','max'=>50],
            [['date_start','date_end'],'date','format'=>'php:Y-m-d H:i:s'],

            ['email','email'],
            ['email','required','when'=>function($model,$attribute){
                return empty($model->login)?false:true;}],
            ['email','required','when'=>function($model,$attribute){
                return empty($model->body)?false:true;}],

            ['result','string','max'=>50],
            ['is_blocked','boolean'],
            ['is_twin','boolean'],

            [['login','password'],'required'],
            ['user_name','string','min'=>5,'max'=>50],
            ['login','string','length'=>[5,10]],
            ['password','match','pattern'=> '/^[A-z]{5,19}/','message'=>'Пароль на латинице не менее 5 символов'],
            ['password_repeat','compare','compareAttribute' => 'password'],
            ['accept_process_data','boolean'],

        ];
    }

    public function beforeValidate()
    {
        if($this->date_start) {
            $date = \DateTime::createFormFormat('d.m.Y H:i:s', $this->date_start);
            if(!$date){
                return parent::beforeValidate();
            }
            $this->date_start = $date->format('d.m.Y H:i:s');
        }
        return parent::beforeValidate(); // TODO: Change the autogenerated stub
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
            'is_blocked'=>'Событие заблокировано',
            'login'=>'Введите логин',
            'date_created'=>'Дата регистрации',
            'password'=>'Пароль',
            'user_name'=>'ФИО пользователя',
            'accept_process_data'=>'Согласие на обработку персональных данных'
        ];
    }
}