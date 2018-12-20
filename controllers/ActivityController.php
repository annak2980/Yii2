<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 17.12.2018
 * Time: 18:39
 */

namespace app\controllers;

use yii\web\Controller;
use app\models\ActivityForm;


class ActivityController extends Controller
{
    public function actionCreate(){

        $model = new ActivityForm(); //создаем модель с описанными в ActivityForm.php атрибутами

        $model -> load(\Yii::$app->request->post()); //заполнение модели данными массива post
        return $this->render('create',['model' => $model]);


    }
}