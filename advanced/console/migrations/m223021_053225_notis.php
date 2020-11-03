<?php

use yii\db\Migration;

/**
 * Class m201021_053225_orkdata
 */
class m223021_053225_notis extends Migration
{
    public function up()
    {
        $this->createTable('notis', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'create_date' => $this->date(),
            'notes_instr' => $this->integer(),
            'skand_id' => $this->integer()
        ]);

        $this->createIndex('FK_instdata', 'notis', 'notes_instr');
        $this->addForeignKey(
            'FK_instdata', 'notis', 'notes_instr', 'instruments', 'id', 'SET NULL', 'CASCADE'
        );
    }
    public function down()
    {
        $this->dropForeignKey('FK_instdata', 'notis');
        $this->dropTable("notis");
    }
}
