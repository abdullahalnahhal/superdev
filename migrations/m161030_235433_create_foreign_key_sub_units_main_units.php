<?php

use yii\db\Migration;

class m161030_235433_create_foreign_key_sub_units_main_units extends Migration
{
    public function up()
    {
        $this->addForeignKey('sub_units_main_units_fk' , 'sub_units' , 'main_unit_id' , 'main_units' , 'id' );
    }

    public function down()
    {
        $this->dropForeignKey('sub_units_main_units_fk' , 'sub_units');
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
