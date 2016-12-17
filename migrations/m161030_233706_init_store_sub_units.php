<?php

use yii\db\Migration;

class m161030_233706_init_store_sub_units extends Migration
{
    public function up()
    {
        $this->createTable('sub_units',[
                'id' => $this->bigPrimaryKey(),
                'units_id' => $this->bigInteger(),
                'main_unit_id' => $this->bigInteger(),
                'main_unit_quantity' => $this->integer(),
            ]);
    }

    public function down()
    {
        $this->dropTable('sub_units');
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
