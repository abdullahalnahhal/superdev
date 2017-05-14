<?php

use yii\db\Migration;

class m161031_000005_create_foreign_key_sub_units_units extends Migration
{
    public function up()
    {
        $this->addForeignKey('sub_units_units_fk' , 'sub_units' , 'units_id' , 'units' , 'id' );
    }

    public function down()
    {
        $this->dropForeignKey('sub_units_units_fk' , 'sub_units');
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
