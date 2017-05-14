<?php

use yii\db\Migration;

class m161102_225437_add_column_less_quantity extends Migration
{
    public function up()
    {
        $this->addColumn("items","less_quantity",$this->integer());
    }

    public function down()
    {
        $this->dropColumn("items","less_quantity");
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
