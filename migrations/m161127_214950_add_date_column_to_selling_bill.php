<?php

use yii\db\Migration;

class m161127_214950_add_date_column_to_selling_bill extends Migration
{
    public function up()
    {
        $this->addColumn("selling_bills","date",$this->date());
    }

    public function down()
    {
        $this->dropColumn("selling_bills","date");
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
