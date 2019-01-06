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

        if(\Yii::$app->request->isAjax) {
            $model = \Yii::$app->activity->getModel(\Yii::$app->request->post());
            return   \Yii::$app->activity->validateAjax($model);
        }

        if(\Yii::$app->request->isPost) {

            $model = \Yii::$app->activity->getModel(\Yii::$app->request->post());
            //получаем модель при помощи ф-ции компонента
            //заполнение модели данными массива post

            \Yii::$app->activity->processingActivity($model);
            //вызываем описанный в config/web.php компонент activity,
            //processingActivity - ф-ция компонента выполняет валидацию и обработку pоst-данных модели

        } else{
            $model = \Yii::$app->activity->getModel(); //просто создаем пустую модель без обработки данных
        }


        return $this->controller->render('create_event',['model' => $model]);
        //возвращает экземпляр контр-ра, который обрабатывает render модели
    }
}