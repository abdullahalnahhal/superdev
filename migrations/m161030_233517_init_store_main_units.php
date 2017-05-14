<?php

use yii\db\Migration;

class m161030_233517_init_store_main_units extends Migration
{
    public function up()
    {
        $this->createTable('main_units',[
                'id' => $this->bigPrimaryKey(),
                'units_id' => $this->bigInteger(),
            ]);
    }

    public function down()
    {
        $this->dropTable('main_units');
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
