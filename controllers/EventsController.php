<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 17.12.2018
 * Time: 18:39
 */

namespace app\controllers;

use yii\web\Controller;
use app\controllers\events\NewyearEvent;
use app\controllers\events\CristmassEvent;


class EventsController extends Controller
{
    public function actions(){

        return [
            'newyear'=>[
                'class'=>NewyearEvent::class
            ],
            'cristmass'=>[
                'class'=>CristmassEvent::class
            ]
        ];
    }
}