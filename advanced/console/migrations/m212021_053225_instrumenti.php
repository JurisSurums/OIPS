<?php

use yii\db\Migration;

/**
 * Class m201021_053225_orkdata
 */
class m212021_053225_instrumenti extends Migration
{
    public function up()
    {
        $this->createTable('instruments', [
            'id' => $this->primaryKey(),
            'instrument' => $this->string()->notNull(),
            'instr_skand' => $this->integer(),
        ]);

        $this->createIndex('FK_skandata', 'instruments', 'instr_skand');
        $this->addForeignKey(
            'FK_skandata', 'instruments', 'instr_skand', 'skandarbi', 'id', 'SET NULL', 'CASCADE'
        );
    }

    public function down()
    {
        $this->dropForeignKey('FK_skandata', 'instruments');
        $this->dropTable("instruments");
    }
}
