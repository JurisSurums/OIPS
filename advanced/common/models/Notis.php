<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "notis".
 *
 * @property int $id
 * @property string $title
 * @property string|null $create_date
 * @property int|null $notes_instr
 * @property int|null $skand_id
 *
 * @property Instruments $notesInstr
 */
class Notis extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notis';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['create_date'], 'safe'],
            [['notes_instr', 'skand_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['notes_instr'], 'exist', 'skipOnError' => true, 'targetClass' => Instruments::className(), 'targetAttribute' => ['notes_instr' => 'id']],
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
            'create_date' => 'Create Date',
            'notes_instr' => 'Notes Instr',
            'skand_id' => 'Skand ID',
        ];
    }

    /**
     * Gets query for [[NotesInstr]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNotesInstr()
    {
        return $this->hasOne(Instruments::className(), ['id' => 'notes_instr']);
    }
}
