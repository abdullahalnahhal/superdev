<?php

use yii\db\Migration;

class m161121_142435_init_selling_module extends Migration
{
    public function up()
    {
        $this->createTable('clients',[
                'id' => $this->bigPrimaryKey(),
                'client_code' => $this->bigInteger(),
                'name' => $this->string(500),
            ]);
        $this->createTable('clients_accounts',[
                'id' => $this->bigPrimaryKey(),
                'clients_id' => $this->bigInteger(),
                'dept' => $this->decimal(20,2),
                'credit' => $this->decimal(20,2),
            ]);
        $this->createTable('selling_bills',[
                'id' => $this->bigPrimaryKey(),
                'clients_id' => $this->bigInteger(),
                'bill_code' => $this->bigInteger(),
                'total_price' => $this->decimal(20,2),
                'total_discount' => $this->decimal(20,2),
            ]);
        $this->createTable('selling_bills_details',[
                'id' => $this->bigPrimaryKey(),
                'selling_bills_id' => $this->bigInteger(),
                'items_id' => $this->bigInteger(),
                'quantity' => $this->integer(),
                'price' => $this->decimal(20,2),
            ]);
        $this->addForeignKey('clients_accounts_clients_id_fk' , 'clients_accounts' , 'clients_id' , 'clients' , 'id' );
        $this->addForeignKey('selling_bills_client_id_fk' , 'selling_bills' , 'clients_id' , 'clients' , 'id' );
        $this->addForeignKey('selling_bills_details_selling_bills_id_fk' , 'selling_bills_details' , 'selling_bills_id' , 'selling_bills' , 'id' );
        $this->addForeignKey('selling_bills_details_items_id_fk' , 'selling_bills_details' , 'items_id' , 'items' , 'id' );
    }

    public function down()
    {
        $this->dropTable('clients');
        $this->dropTable('clients_accounts');
        $this->dropTable('selling_bills');
        $this->dropTable('selling_bills_details');
        $this->dropForeignKey('clients_accounts_clients_id_fk' , 'clients_accounts');
        $this->dropForeignKey('selling_bills_client_id_fk' , 'selling_bills');
        $this->dropForeignKey('selling_bills_details_selling_bills_id_fk' , 'selling_bills_details');
        $this->dropForeignKey('selling_bills_details_items_id_fk' , 'selling_bills_details');
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
