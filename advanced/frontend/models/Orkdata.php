<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orkdata".
 *
 * @property int $id
 * @property int|null $instrument
 * @property string|null $participation
 * @property int|null $person_id
 *
 * @property User $person
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
            [['instrument', 'person_id'], 'integer'],
            [['participation'], 'safe'],
            [['person_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['person_id' => 'id']],
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
            'person_id' => Yii::t('app', 'Person ID'),
        ];
    }

    /**
     * Gets query for [[Person]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPerson()
    {
        return $this->hasOne(User::className(), ['id' => 'person_id']);
    }
}
