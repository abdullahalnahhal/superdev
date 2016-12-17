<?php

use yii\db\Migration;

class m161030_234048_create_foreign_key_items_main_units extends Migration
{
    public function up()
    {
        $this->addForeignKey('items_main_units_fk' , 'items' , 'main_unit_id' , 'main_units' , 'id' );
    }

    public function down()
    {
        $this->dropForeignKey('items_main_units_fk' , 'items');
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
