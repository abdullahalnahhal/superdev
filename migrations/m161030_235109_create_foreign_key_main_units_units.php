<?php

use yii\db\Migration;

class m161030_235109_create_foreign_key_main_units_units extends Migration
{
    public function up()
    {
        $this->addForeignKey('main_units_units_fk' , 'main_units' , 'units_id' , 'units' , 'id' );
    }

    public function down()
    {
        $this->dropForeignKey('main_units_units_fk' , 'main_units');
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
