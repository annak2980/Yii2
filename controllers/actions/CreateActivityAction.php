<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 20.12.2018
 * Time: 10:05
 */

namespace app\controllers\actions;

use yii\base\Action;

class CreateActivityAction extends Action
{
    public function run(){

        //пример
        //можно создать ссылку на компонент динамически, а не в config\web.php
        // при помощи описания  'class'=>\app\components\ActivityComponent::class
        //          $component = \Yii::createObject(['class'=>\app\components\ActivityComponent::class,
        //         'class_activity_form' => '\app\models\ActivityForm']);
        //тогда дальше можно обращаться к компоненту так:
        //          $component->getModel();  $component->processingActivity($model);

        if(\Yii::$app->request->isAjax) {
            $model = \Yii::$app->activity->getModel(\Yii::$app->request->post());
            return   \Yii::$app->activity->validateAjax($model);
        }

        if(\Yii::$app->request->isPost) {

            $model = \Yii::$app->activity->getModel(\Yii::$app->request->post());
            //получаем модель при помощи ф-ции компонента
            //заполнение модели данными массива post

            if(\Yii::$app->activity->processingActivity($model)){
                return $this->controller->redirect(['/activity/view_action','id'=>$model->id]);
            }
            //вызываем описанный в config/web.php компонент activity,
            //processingActivity - ф-ция компонента выполняет валидацию и обработку pоst-данных модели

            //вывод массива с ошибками
            //    print_r($model->getErrors();

        } else{
            $model = \Yii::$app->activity->getModel(); //просто создаем пустую модель без обработки данных
        }

        //$this->controller->view->params['label_home']='Домашняя страница'; //передача параметров во view
        //

        return $this->controller->render('create_activity',['model' => $model]);
        //возвращает экземпляр контр-ра, который обрабатывает render модели
    }
}