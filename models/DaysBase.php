<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "days".
 *
 * @property int $id
 * @property string $calendar_data
 * @property int $is_weekend
 * @property int $is_holiday
 * @property string $create_at
 * @property string $update_at
 *
 * @property Events[] $events
 */
class DaysBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'days';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['calendar_data', 'create_at', 'update_at'], 'safe'],
            [['is_weekend', 'is_holiday'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'calendar_data' => Yii::t('app', 'Calendar Data'),
            'is_weekend' => Yii::t('app', 'Is Weekend'),
            'is_holiday' => Yii::t('app', 'Is Holiday'),
            'create_at' => Yii::t('app', 'Create At'),
            'update_at' => Yii::t('app', 'Update At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvents()
    {
        return $this->hasMany(Events::className(), ['day_id' => 'id']);
    }
}
