<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "units".
 *
 * @property integer $id
 * @property string $unit_name
 *
 * @property MainUnits[] $mainUnits
 * @property SubUnits[] $subUnits
 */
class Units extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'units';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['unit_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'unit_name' => 'Unit Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMainUnits()
    {
        return $this->hasMany(MainUnits::className(), ['units_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubUnits()
    {
        return $this->hasMany(SubUnits::className(), ['units_id' => 'id']);
    }
}
