<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 06.01.2019
 * Time: 22:39
 */

namespace app\controllers\actions;


use yii\base\Action;

class ViewEventAction extends Action
{
    public function run($id){

        //Проверим, что пользователь авторизован
        \Yii::$app->user_comp->checkAuthUsers();

        //$model=\Yii::$app->event->getModelFromId($id);
        $model=Events::find()->andWhere(['id'=>$id])->one();

        //Подключаем пользователю право просматривать только свои мероприятия
        \Yii::$app->user_comp->checkCanUsers('viewEvent');

        return $this->controller->render('view_event',['model'=>$model]);

    }
}