<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 06.01.2019
 * Time: 16:56
 */

namespace app\models;


class UsersSignIn extends Users
{

    public $rememberMe=true;

    public function rules()
    {
        return array_merge([
            ['password','validatePassword']
        ],parent::rules());
    }

    public function validatePassword($attribute){
        $user=\Yii::$app->user_comp->getUser($this->username);
        if(!$user){
            $this->addError('username','Пользователь с именем '.$this->username.' не существует');
            return false;
        }

        if(!$this->checkPassword($this->password,$user->password)){
            $this->addError('password','Пароль не верный');
        }
    }


    public function checkPassword($password,$password_hash){
        return \Yii::$app->security->validatePassword($password,$password_hash);
    }
}