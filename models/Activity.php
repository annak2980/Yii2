<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "activity".
 *
 *
 * @property Users $user
 */
class Activity extends ActivityBase
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'activity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'is_repeat', 'is_block', 'user_id'], 'integer'],
            [['body'], 'string'],
            [['create_at', 'update_at', 'date_start', 'date_end'], 'safe'],
            [['title'], 'required'],
            [['address'], 'string', 'max' => 1000],
            [['title'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_user' => Yii::t('app', 'Id User'),
            'body' => Yii::t('app', 'Body'),
            'address' => Yii::t('app', 'Address'),
            'is_repeat' => Yii::t('app', 'Is Repeat'),
            'is_block' => Yii::t('app', 'Is Block'),
            'create_at' => Yii::t('app', 'Create At'),
            'update_at' => Yii::t('app', 'Update At'),
            'user_id' => Yii::t('app', 'User ID'),
            'title' => Yii::t('app', 'Title'),
            'date_start' => Yii::t('app', 'Date Start'),
            'date_end' => Yii::t('app', 'Date End'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
}
