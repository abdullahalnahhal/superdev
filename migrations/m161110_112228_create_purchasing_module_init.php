<?php

use yii\db\Migration;

class m161110_112228_create_purchasing_module_init extends Migration
{
    public function up()
    {
        $this->createTable('suppliers',[
                'id' => $this->bigPrimaryKey(),
                'supplier_code' => $this->bigInteger(),
                'name' => $this->string(500),
                'Address' => $this->text(),
                'company' => $this->string(),
            ]);
        $this->createTable('suppliers_accounts',[
                'id' => $this->bigPrimaryKey(),
                'suppliers_id' => $this->bigInteger(),
                'dept' => $this->decimal(20,2),
                'credit' => $this->decimal(20,2),
            ]);
        $this->createTable('purchasing_bills',[
                'id' => $this->bigPrimaryKey(),
                'suppliers_id' => $this->bigInteger(),
                'bill_code' => $this->bigInteger(),
                'total_cost' => $this->decimal(20,2),
                'total_discount' => $this->decimal(20,2),
            ]);
        $this->createTable('purchasing_bills_details',[
                'id' => $this->bigPrimaryKey(),
                'purchasing_bills_id' => $this->bigInteger(),
                'items_id' => $this->bigInteger(),
                'quantity' => $this->integer(),
                'cost' => $this->decimal(20,2),
            ]);
        $this->addForeignKey('suppliers_accounts_suppliers_id_fk' , 'suppliers_accounts' , 'suppliers_id' , 'suppliers' , 'id' );
        $this->addForeignKey('purchasing_bills_supplier_id_fk' , 'purchasing_bills' , 'suppliers_id' , 'suppliers' , 'id' );
        $this->addForeignKey('purchasing_bills_details_purchasing_bills_id_fk' , 'purchasing_bills_details' , 'purchasing_bills_id' , 'purchasing_bills' , 'id' );
        $this->addForeignKey('purchasing_bills_details_items_id_fk' , 'purchasing_bills_details' , 'items_id' , 'items' , 'id' );
    }

    public function down()
    {
        $this->dropTable('suppliers');
        $this->dropTable('suppliers_accounts');
        $this->dropTable('purchasing_bills');
        $this->dropTable('purchasing_bills_details');
        $this->dropForeignKey('suppliers_accounts_suppliers_id_fk' , 'suppliers_accounts');
        $this->dropForeignKey('purchasing_bills_supplier_id_fk' , 'purchasing_bills');
        $this->dropForeignKey('purchasing_bills_details_purchasing_bills_id_fk' , 'purchasing_bills_details');
        $this->dropForeignKey('purchasing_bills_details_items_id_fk' , 'purchasing_bills_details');
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
