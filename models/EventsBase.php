<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "events".
 *
 * @property int $id
 * @property int $day_id
 * @property int $activity_id
 * @property string $title
 * @property string $body
 * @property int $user_id
 * @property string $create_at
 * @property string $update_at
 *
 * @property Days $day
 */
class EventsBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'events';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['day_id', 'activity_id'], 'integer'],
            [['user_id'], 'integer'],
            [['title', 'body'], 'required'],
            [['body'], 'string'],
            [['create_at', 'update_at'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['day_id'], 'exist', 'skipOnError' => true, 'targetClass' => Days::className(), 'targetAttribute' => ['day_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'day_id' => Yii::t('app', 'Day ID'),
            'activity_id' => Yii::t('app', 'Activity ID'),
            'title' => Yii::t('app', 'Title'),
            'body' => Yii::t('app', 'Body'),
            'create_at' => Yii::t('app', 'Create At'),
            'update_at' => Yii::t('app', 'Update At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDay()
    {
        return $this->hasOne(Days::className(), ['id' => 'day_id']);
    }
}
