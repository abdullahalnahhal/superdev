<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "main_units".
 *
 * @property integer $id
 * @property integer $units_id
 *
 * @property \app\models\Items[] $items
 * @property \app\models\Units $units
 * @property \app\models\SubUnits[] $subUnits
 * @property string $aliasModel
 */
abstract class MainUnits extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'main_units';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['units_id'], 'integer'],
            [['units_id'], 'exist', 'skipOnError' => true, 'targetClass' => Units::className(), 'targetAttribute' => ['units_id' => 'id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'units_id' => 'Units ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasMany(\app\models\Items::className(), ['main_unit_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnits()
    {
        return $this->hasOne(\app\models\Units::className(), ['id' => 'units_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubUnits()
    {
        return $this->hasMany(\app\models\SubUnits::className(), ['main_unit_id' => 'id']);
    }




}