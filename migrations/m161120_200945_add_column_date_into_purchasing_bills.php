<?php

use yii\db\Migration;

class m161120_200945_add_column_date_into_purchasing_bills extends Migration
{
    public function up()
    {
        $this->addColumn("purchasing_bills","date",$this->date());
    }

    public function down()
    {
        $this->dropColumn("purchasing_bills","date");
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
