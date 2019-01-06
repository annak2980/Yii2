<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 06.01.2019
 * Time: 13:06
 */

namespace app\controllers;

use yii\web\Controller;
use yii\web\HttpException;

class UsersController extends Controller
{
    public function actionGenUser(){

        \Yii::$app->user_comp->createUsers();
        echo 'ok';
    }

    public function actionSignIn(){

        if(\Yii::$app->request->isPost){
            $model=\Yii::$app->user_comp->getModelAuth(\Yii::$app->request->post()); //заполняем модель данными из формы
            if(!$model){
                throw new HttpException(400,'model not found');
            }
            if(\Yii::$app->user_comp->validateAuthUser($model)){
                return $this->redirect(['/activity/event_calendar']);
            }
        }
        else{
            $model=\Yii::$app->user_comp->getModelAuth();                           //просто получаем пустую модель
        }

        return $this->render('sign_in',['model'=>$model]);
    }
}