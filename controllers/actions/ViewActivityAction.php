<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 06.01.2019
 * Time: 22:39
 */

namespace app\controllers\actions;


use yii\base\Action;

class ViewActivityAction extends Action
{
    public function run($id){

        $model=\Yii::$app->activity->getModelFromId($id);

        return $this->controller->render('view_activity',['model'=>$model]);

    }
}