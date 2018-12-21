<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 20.12.2018
 * Time: 10:05
 */

namespace app\controllers\actions;

use app\models\DeleteForm;
use yii\base\Action;

class DeleteAction extends Action
{
    public function run(){

        $model = new DeleteForm();                    //создаем модель с описанными в ActivityForm.php атрибутами

        $model->result = "Поиск подходящего мероприятия...";
        if(\Yii::$app->request->isPost) {
            $model->load(\Yii::$app->request->post()); //заполнение модели данными массива post

            if ($model->validate()) { //проверка значений модели по описанным правилам rules()
                $model->result = "Мероприятие успешно удалено";
                //!!!!!!!!Вставить ф-цию - обработчкик удаления найденной записи из базы
            };

        }

        return $this->controller->render('delete',['model' => $model, 'label_home' => 'Домашняя страница']); //возвращает экземпляр контр-ра, который
    }                                                                        //обрабатывает render модели
}