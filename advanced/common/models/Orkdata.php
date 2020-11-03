<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orkdata".
 *
 * @property int $id
 * @property string $instrument
 * @property int|null $instr_id
 * @property string|null $participation
 * @property int|null $user_id
 *
 * @property Instruments $instr
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
            [['instrument'], 'required'],
            [['instr_id', 'user_id'], 'integer'],
            [['participation'], 'safe'],
            [['instrument'], 'string', 'max' => 255],
            [['instr_id'], 'unique'],
            [['instr_id'], 'exist', 'skipOnError' => true, 'targetClass' => Instruments::className(), 'targetAttribute' => ['instr_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'instrument' => 'Instrument',
            'instr_id' => 'Instr ID',
            'participation' => 'Participation',
            'user_id' => 'User ID',
        ];
    }

    /**
     * Gets query for [[Instr]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInstr()
    {
        return $this->hasOne(Instruments::className(), ['id' => 'instr_id']);
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

    public function getUsersInstruments($userID)
    {
        $r = Orkdata::find()->select(['instrument', 'user_id'])->all();
        $data = array();
        $iter = 0;
        foreach ($r as $d) {
            if($d['user_id'] == $userID)
            {
                $data[$iter] = $d['instrument'];
                $iter++;
            }
        }
        return $data;
    }
}
