<?php

use common\models\User;
use yii\db\Migration;

class m160307_190535_default_user extends Migration
{
    public function up()
    {
        $this->insert(User::tableName(), [
            'username' => 'demouser',
            'auth_key' => 'Jg6O-7Sho1sxY38OgTcx3RTX30VUlXTi',
            'password_hash' => '$2y$13$MKjLOsF/qyONMpwqhOe99ufFNK.3f8amFf5lB27/4zD9F1Xj4EiVy',
            'email' => 'user@localhost.local',
            'role' => '10',
            'status' => '10',
            'created_at' => time(),
            'updated_at' => time()
        ]);
    }

    public function down()
    {
        $this->delete(User::tableName(), 'username = "demoadmin"');
    }
}
