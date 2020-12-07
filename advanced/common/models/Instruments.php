<?php

namespace common\models;

use common\models\Notis;
use Yii;
use common\models\Skandarbi;

/**
 * This is the model class for table "instruments".
 *
 * @property int $id
 * @property string $instrument
 * @property int|null $instr_skand
 *
 * @property Skandarbi $instrSkand
 * @property Notis[] $notis
 * @property Orkdata $orkdata
 */
class Instruments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'instruments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['instrument'], 'required'],
            [['instr_skand'], 'integer'],
            [['instrument'], 'string', 'max' => 255],
            [['instr_skand'], 'exist', 'skipOnError' => true, 'targetClass' => Skandarbi::className(), 'targetAttribute' => ['instr_skand' => 'id']],
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
            'instr_skand' => 'Instr Skand',
        ];
    }

    /**
     * Gets query for [[InstrSkand]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInstrSkand()
    {
        return $this->hasOne(Skandarbi::className(), ['id' => 'instr_skand']);
    }

    /**
     * Gets query for [[Notis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNotis()
    {
        return $this->hasMany(Notis::className(), ['notes_instr' => 'id']);
    }

    /**
     * Gets query for [[Orkdata]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrkdata()
    {
        return $this->hasOne(Orkdata::className(), ['instr_id' => 'id']);
    }

    public function getSkandIDByName($skandName) // skandarbu id
    {
        $sk = new Skandarbi();
        return $sk->SkandByName($skandName);
    }
    public function getInstrID($skandID, $InstrName) // instr id
    {
        $InstrID = Instruments::find()->where(['instr_skand'=>$skandID, 'instrument'=>$InstrName])->all();
        return $InstrID[0]["id"];
    }
    public function Notis($notis, $instrID, $skandID) // pievieno jaunus nošu ierakstus
    {
        foreach ($notis as $not)
        {
            $intialize = new Notis();
            $intialize->notes_instr = $instrID;
            $currDate = date('Y-m-d');
            $intialize->create_date = $currDate;
            $intialize->title = $not->name;
            $intialize->skand_id = $skandID;
            $intialize->save();
        }
    }
    public function NotisD($instrID, $skandID) // dzēš nošu ierakstus
    {
/*        var_dump($instrID);
        var_dump($skandID);
        exit();*/
        Notis::deleteAll(["notes_instr"=>$instrID, "skand_id"=>$skandID]);
    }
}
