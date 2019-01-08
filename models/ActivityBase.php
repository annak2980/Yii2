<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "activity".
 *
 * @property int $id
 * @property int $id_user
 * @property string $body
 * @property string $address
 * @property int $is_repeat
 * @property int $is_block
 * @property string $create_at
 * @property string $update_at
 * @property int $user_id
 * @property string $title
 * @property string $date_start
 * @property string $date_end
 *
 * @property Users $user
 */
class ActivityBase extends \yii\db\ActiveRecord
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
            [['is_repeat', 'is_block', 'user_id'], 'integer'],
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
