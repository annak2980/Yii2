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

class NewyearEvent extends Action
{
    public function run(){

        $model = new EventForm();             //создаем модель с описанными в EventForm.php атрибутами
                                             //заполняем модель конкретного праздника значениями
        $model->date = "31.12";
        $model->title = "Новый год";
        $model->body = "Наступает новый, 2019 год, год земляной свиньи";

        $model->validate();                  //проверка значений модели по описанным правилам rules()

        return $this->controller->render('event',['model' => $model]); //возвращает экземпляр контр-ра, который
    }                                                                        //обрабатывает render модели
}

