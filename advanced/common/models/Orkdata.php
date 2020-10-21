<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "orkdata".
 *
 * @property int $id
 * @property string|null $instrument
 * @property string|null $participation
 * @property int|null $user_id
 *
 * @property User $user
 */
class Orkdata extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orkdata';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['instrument', 'user_id'], 'string'],
            [['participation'], 'safe'],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className()], //, 'targetAttribute' => ['user_id' => 'id']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'instrument' => Yii::t('app', 'Instrument'),
            'participation' => Yii::t('app', 'Participation'),
            'user_id' => Yii::t('app', 'User ID'),
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
