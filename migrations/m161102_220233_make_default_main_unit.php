<?php

use yii\db\Migration;

class m161102_220233_make_default_main_unit extends Migration
{
    public function up()
    {
        $this->insert( "units" , ["id" => 1 , "unit_name" => "القطعة"] );
        $this->insert( "main_units" , ["id" => 1 , "units_id" => 1] );
    }

    public function down()
    {
        echo "m161102_220233_make_default_main_unit cannot be reverted.\n";
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
