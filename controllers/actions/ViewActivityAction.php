<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 06.01.2019
 * Time: 22:39
 */

namespace app\controllers\actions;


use yii\base\Action;

class ViewActivityAction extends Action
{
    public function run($id){

        //Проверим, что пользователь авторизован
        \Yii::$app->user_comp->checkAuthUsers();

        $model=\Yii::$app->activity->getModelFromId($id);

        //Подключаем пользователю право просматривать только свои мероприятия
        \Yii::$app->user_comp->canViewAuthorActivity($model,'authorActivity','viewActivity');

        return $this->controller->render('view_activity',['model'=>$model]);

    }
}