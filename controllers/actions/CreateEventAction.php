<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 20.12.2018
 * Time: 10:05
 */

namespace app\controllers\actions;

use yii\base\Action;

class CreateEventAction extends Action
{
    public function run(){

        //Проверим, что пользователь авторизован
        \Yii::$app->user_comp->checkAuthUsers();

        //Проверим, имеет ли пользователь право создавать события
        \Yii::$app->user_comp->checkCanUsers('createEvent');

        if(\Yii::$app->request->isAjax) {
            $model = \Yii::$app->event->getModel(\Yii::$app->request->post());
            return   \Yii::$app->event->validateAjax($model);
        }

        if(\Yii::$app->request->isPost) {

            $model = \Yii::$app->event->getModel(\Yii::$app->request->post());

            if(\Yii::$app->event->processingActivity($model)){
                return $this->controller->redirect(['/activity/view_event','id'=>$model->id]);
            }

        } else{
            $model = \Yii::$app->event->getModel(); //просто создаем пустую модель без обработки данных
        }


        return $this->controller->render('create_event',['model' => $model]);
        //возвращает экземпляр контр-ра, который обрабатывает render модели
    }
}