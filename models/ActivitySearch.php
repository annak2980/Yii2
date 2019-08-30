<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 08.01.2019
 * Time: 21:11
 */

namespace app\models;

use yii\data\ActiveDataProvider;

class ActivitySearch extends Activity
{
    public function search($params){
        $comp=\Yii::$app->activity;
        $query=$comp->getModel()::find();

        $provider = new ActiveDataProvider([
            'query'=>$query,
            'pagination'=>[
                'pageSize'=>5
            ],
            'sort'=>[
                'defaultOrder' => [
                    'date_start'=>SORT_ASC
                ]
            ]
        ]);

        return $provider;
    }
}