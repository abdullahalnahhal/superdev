<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "selling_bills".
 *
 * @property string $id
 * @property string $clients_id
 * @property string $bill_code
 * @property string $total_price
 * @property string $total_discount
 * @property string $date
 *
 * @property \app\models\Clients $clients
 * @property \app\models\SellingBillsDetails[] $sellingBillsDetails
 * @property string $aliasModel
 */
abstract class SellingBills extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'selling_bills';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['clients_id', 'bill_code'], 'integer'],
            [['total_price', 'total_discount'], 'number'],
            [['date'], 'safe'],
            [['clients_id'], 'exist', 'skipOnError' => true, 'targetClass' => Clients::className(), 'targetAttribute' => ['clients_id' => 'id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'clients_id' => 'Clients ID',
            'bill_code' => 'Bill Code',
            'total_price' => 'Total Price',
            'total_discount' => 'Total Discount',
            'date' => 'Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClients()
    {
        return $this->hasOne(\app\models\Clients::className(), ['id' => 'clients_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSellingBillsDetails()
    {
        return $this->hasMany(\app\models\SellingBillsDetails::className(), ['selling_bills_id' => 'id']);
    }




}