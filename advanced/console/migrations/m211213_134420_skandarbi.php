<?php

use common\models\Comment;
use common\models\Post;
use common\models\User;
use yii\db\Migration;

class m211213_134420_skandarbi extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('skandarbi', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'description' => $this->string(),
            'create_date' => $this->date()
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('skandarbi');
    }
}
