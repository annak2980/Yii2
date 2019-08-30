<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 11.01.2019
 * Time: 14:35
 */

namespace app\controllers\actions;


use yii\base\Action;

class SearchActivityAction extends Action
{
    public function run(){

        $comp=\Yii::$app->activity;
        $model=$comp->getModelSearch();
        $provider=$model->search(\Yii::$app->request->queryParams);

        return $this->controller->render('search_activity',['model'=>$model,'provider'=>$provider]);
    }

}