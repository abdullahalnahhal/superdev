<?php

use yii\db\Migration;

class m161030_231913_init_store_and_items_layout extends Migration
{
    public function up()
    {
        $this->createTable('items',[
                'id' => $this->bigPrimaryKey(),
                'item_code' => $this->bigInteger(),
                'item_name' => $this->string(500),
                'quantity' => $this->integer(),
                'price' => $this->decimal(20,2),
                'main_unit_id' => $this->bigInteger(),
            ]);
    }

    public function down()
    {
        $this->dropTable('items');
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
