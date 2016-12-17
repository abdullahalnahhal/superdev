<?php

use yii\db\Migration;

class m161103_140747_make_item_code_index_unique extends Migration
{
    public function up()
    {
        $this->createIndex ( "item_code_unique", "items" , "item_code", $unique = true );
    }

    public function down()
    {
        $this->dropIndex ( "item_code_unique", "items" );
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
