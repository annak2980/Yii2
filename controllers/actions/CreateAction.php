<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 20.12.2018
 * Time: 10:05
 */

namespace app\controllers\actions;

use app\models\ActivityForm;
use yii\base\Action;

class CreateAction extends Action
{
    public function run(){

        $model = new ActivityForm();                    //создаем модель с описанными в ActivityForm.php атрибутами

        if(\Yii::$app->request->isPost) {
            $model->load(\Yii::$app->request->post()); //заполнение модели данными массива post
            $model->validate();                        //проверка значений модели по описанным правилам rules()
        }

        return $this->controller->render('create',['model' => $model]); //возвращает экземпляр контр-ра, который
    }                                                                        //обрабатывает render модели
}