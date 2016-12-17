<?php

use yii\db\Migration;

class m161203_155558_create_users_table extends Migration
{
    public function up()
    {
        $this->createTable('users',[
                'id' => $this->bigPrimaryKey(),
                'name' => $this->bigInteger(),
                'username' => $this->string(500),
                'password' => $this->string(500),
            ]);
    }

    public function down()
    {
        $this->dropTable('users');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
