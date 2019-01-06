<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 06.01.2019
 * Time: 13:31
 */

namespace app\components;

use app\models\Users;
use yii\base\Component;
use app\models\UsersSignUp;
use app\models\UsersSignIn;

class UsersComponent extends Component
{
    public $class_user_sign_in;
    public $class_user_sign_up;

    /**
     * @param $username
     * @return Users|array|\yii\db\ActiveRecord|null
     */
    public function getUser($username){

        return Users::find()->andWhere(['username'=>$username])->one();

    }

    /**
     * @param UsersSignIn $model
     * @return bool
     */
    public function validateAuthUser(UsersSignIn $model){

        if($model->validate()){
            $user=$this->getUser($model->username);
            return $this->login($user);
        }
        return false;
    }

    /**
     * @param Users $user
     * @return bool
     */
    public function login(Users $user){
        return \Yii::$app->user->login($user, 3600*12*24);
    }

    /**
     * @param array $params
     * @return UsersSignIn
     */
    public function getModelAuth($params=[]){

        $user=new $this->class_user_sign_in();
        //подстановка в абстракцию задается в config\web.php настройкой 'class_user_sign_in' => '\app\models\UsersSignIn'

        if(!empty($params)){
            $user->load($params);
        }
        return $user;
    }

    public function createUsers(){

        $user=new $this->class_user_sign_up();
        //подстановка в абстракцию задается в config\web.php настройкой 'class_user_sign_up' => '\app\models\UsersSignUp'

        $user->username='administrator';
        $user->email='admin@gmail.com';
        $user->password=$user->generatePassword('administrator'); //ф-ции из модели
        $user->auth_key=$user->generateAuthKey();

        if(!$user->save()){  //save автоматически вызывает validate
            throw new HttpExeption(400,'error save model user');
        }

        $user=new $this->class_user_sign_up();
        $user->username='manager';
        $user->email='manager@gmail.com';
        $user->password=$user->generatePassword('manager');
        $user->auth_key=$user->generateAuthKey();

        if(!$user->save()){  //save автоматически вызывает validate
            throw new HttpExeption(400,'error save model user');
        }
    }
}