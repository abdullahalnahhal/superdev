<?php

use yii\db\Migration;

class m161030_233333_init_store_units extends Migration
{
    public function up()
    {
        $this->createTable('units',[
                'id' => $this->bigPrimaryKey(),
                'unit_name' => $this->string(),
            ]);
    }

    public function down()
    {
        $this->dropTable('units');
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
