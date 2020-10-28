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
            'instr' => $this->string()
        ]);

        $this->createIndex('FK_instdata', 'notis', 'instr');
        $this->addForeignKey(
            'FK_instdata', 'notis', 'instr', 'instruments', 'instrument', 'SET NULL', 'CASCADE'
        );
    }
    public function down()
    {
        $this->dropForeignKey('FK_instdata', 'notis');
        $this->dropTable("instruments");
    }
}
