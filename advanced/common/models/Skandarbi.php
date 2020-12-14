<?php

namespace common\models;

use Yii;
use common\models\Instruments;
use common\models\Notis;

/**
 * This is the model class for table "skandarbi".
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string|null $create_date
 *
 * @property Instruments[] $instruments
 */
class Skandarbi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'skandarbi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['create_date'], 'safe'],
            [['title', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'create_date' => 'Create Date',
        ];
    }

    /**
     * Gets query for [[Instruments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInstruments()
    {
        return $this->hasMany(Instruments::className(), ['instr_skand' => 'id']);
    }

    public function SkandByName($namo)
    {
        $r = Skandarbi::find()->select(['id', 'title'])->where(['title'=>$namo])->all();
/*        var_dump($namo);
        exit();*/
        return $r[0]["id"];
    }

    public function DeleteSkand($namo)
    {
        $r = $this->SkandByName($namo);
        Instruments::deleteAll(['instr_skand' => $r]);
        Notis::deleteAll(['skand_id' => $r]);
        Skandarbi::deleteAll(['id'=>$r]);
        var_dump("check");
    }

    public function createInst($skandId)
    {
    $items = array("trompetes", "mežragi", "tromboni", "tubas", "vijoles", "alti",
        "čelli", "kontrabasi", "flautas", "obojas", "klarnetes",
        "fagoti", "flautas", "timpāni", "bungas", "šķīvji un zvani"
    );
        foreach ($items as $i)
        {
            $n = new Instruments();
            $n->instrument = $i;
            $n->instr_skand = $skandId;
            $n->save();
        }
    }
}
