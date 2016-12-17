<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "items".
 *
 * @property integer $id
 * @property integer $item_code
 * @property string $item_name
 * @property integer $quantity
 * @property string $price
 * @property integer $main_unit_id
 *
 * @property \app\models\MainUnits $mainUnit
 * @property string $aliasModel
 */
abstract class Items extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'items';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_code', 'quantity', 'main_unit_id'], 'integer'],
            [['price'], 'number'],
            [['item_name'], 'string', 'max' => 500],
            [['main_unit_id'], 'exist', 'skipOnError' => true, 'targetClass' => MainUnits::className(), 'targetAttribute' => ['main_unit_id' => 'id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item_code' => 'Item Code',
            'item_name' => 'Item Name',
            'quantity' => 'Quantity',
            'price' => 'Price',
            'main_unit_id' => 'Main Unit ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMainUnit()
    {
        return $this->hasOne(\app\models\MainUnits::className(), ['id' => 'main_unit_id']);
    }




}
