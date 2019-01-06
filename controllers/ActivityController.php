<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 17.12.2018
 * Time: 18:39
 */

namespace app\controllers;

use app\controllers\actions\CreateActivityAction;
use app\controllers\actions\CreateEventAction;
use app\controllers\actions\TestDaoAction;
use app\controllers\actions\EventCalendarAction;

use yii\web\Controller;


class ActivityController extends Controller
{
    /**
     * @return array
     */
    public function actions(){

        return [
            'create'=>[
                'class'=>CreateActivityAction::class
            ],
            'new_action'=>[                           //можно использовать один и тот же переход для разных
                'class'=>CreateActivityAction::class          //actions, вводимых в адресной строке
            ],
            'test_dao'=>[
                'class'=>TestDaoAction::class
            ],
            'new_event'=>[
                'class'=>CreateEventAction::class
            ],
            'event_calendar'=>[
                'class'=>EventCalendarAction::class
            ],
        ];
    }
}