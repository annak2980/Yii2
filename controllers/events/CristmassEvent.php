<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 20.12.2018
 * Time: 10:05
 */

namespace app\controllers\events;

use app\models\EventForm;
use yii\base\Action;

class CristmassEvent extends Action
{
    public function run(){

        $model = new EventForm();             //создаем модель с описанными в EventForm.php атрибутами
                                             //заполняем модель конкретного праздника значениями
        $model->date = "07.01";
        $model->title = "Рождество";
        $model->body = "Православное Рождество Христово";

        $model->validate();                  //проверка значений модели по описанным правилам rules()

        return $this->controller->render('event',['model' => $model, 'label_home' => 'Домашняя страница']); //возвращает экземпляр контр-ра, который
    }                                                                        //обрабатывает render модели
}

