<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 17.12.2018
 * Time: 18:39
 */

namespace app\controllers;

use yii\web\Controller;


class EventsController extends Controller
{
    public function actionNewyear(){
        return $this->render('year');
    }
}