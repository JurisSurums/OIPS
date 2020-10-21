<?php

use yii\db\Migration;

/**
 * Class m201021_053225_orkdata
 */
class m201021_053225_orkdata extends Migration
{
    public function up()
    {
        $this->createTable('orkdata', [
            'id' => $this->primaryKey(),
            'instrument' => $this->string(),
            'participation' => $this->timestamp(),
            'user_id' => $this->integer()
        ]);

        $this->createIndex('FK_orkdata', 'orkdata', 'user_id');
        $this->addForeignKey(
            'FK_user_orkd', 'orkdata', 'user_id', 'user', 'id', 'SET NULL', 'CASCADE'
        );
    }

    public function down()
    {
        $this->dropForeignKey('FK_user_orkd', 'orkdata');
        $this->dropTable("orkdata");
    }
}
