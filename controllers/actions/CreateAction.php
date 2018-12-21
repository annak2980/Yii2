<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 20.12.2018
 * Time: 10:05
 */

namespace app\controllers\actions;

use yii\base\Action;

class CreateAction extends Action
{
    public function run(){

        //пример
        //можно создать ссылку на компонент динамически, а не в config\web.php
        // при помощи описания  'class'=>\app\components\ActivityComponent::class
        //          $component = \Yii::createObject(['class'=>\app\components\ActivityComponent::class,
        //         'class_activity_form' => '\app\models\ActivityForm']);
        //тогда дальше можно обращаться к компоненту так:
        //          $component->getModel();  $component->processingActivity($model);


        if(\Yii::$app->request->isPost) {

            $model = \Yii::$app->activity->getModel(\Yii::$app->request->post());
                                                                 //получаем модель при помощи ф-ции компонента
                                                                //заполнение модели данными массива post

            $model = \Yii::$app->activity->processingActivity($model);
                //вызываем описанный в config/web.php компонент activity,
                //processingActivity - ф-ция компонента выполняет валидацию и обработку pоst-данных модели

        } else{
               $model = \Yii::$app->activity->getModel(); //просто создаем пустую модель без обработки данных
        }

        return $this->controller->render('create',['model' => $model, 'label_home' => 'Домашняя страница']);
        //возвращает экземпляр контр-ра, который обрабатывает render модели
    }
}