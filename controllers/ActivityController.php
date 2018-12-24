<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 17.12.2018
 * Time: 18:39
 */

namespace app\controllers;

use app\controllers\actions\CreateAction;

use yii\web\Controller;



class ActivityController extends Controller
{
    /**
     * @return array
     */
    public function actions(){

        return [
            'create'=>[
                'class'=>CreateAction::class
            ],
            'new_action'=>[                           //можно использовать один и тот же переход для разных
                'class'=>CreateAction::class          //actions, вводимых в адресной строке
            ],
        ];
    }
}