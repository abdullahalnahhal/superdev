<?php

use yii\db\Migration;

class m161110_222808_add_column_date_into_suppliers_accounts extends Migration
{
    public function up()
    {
        $this->addColumn("suppliers_accounts","date",$this->date());
    }

    public function down()
    {
        $this->dropColumn("suppliers_accounts","date");
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
