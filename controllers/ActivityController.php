<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 17.12.2018
 * Time: 18:39
 */

namespace app\controllers;

use app\controllers\actions\SearchActivityAction;
use app\controllers\actions\CreateActivityAction;
use app\controllers\actions\ViewActivityAction;
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
                'class'=>CreateActivityAction::class //можно использовать один и тот же переход для разных
            ],                                       //actions, вводимых в адресной строке
            'new_activity'=>[
                'class'=>CreateActivityAction::class
            ],
            'view_activity'=>[
                'class'=>ViewActivityAction::class
            ],
            'search_activity'=>[
                'class'=>SearchActivityAction::class
            ],
            'new_event'=>[
                'class'=>CreateEventAction::class
            ],
            'view_event'=>[
                'class'=>ViewEventAction::class
            ],
            'test_dao'=>[
                'class'=>TestDaoAction::class
            ],
            'event_calendar'=>[
                'class'=>EventCalendarAction::class
            ],
        ];
    }
}