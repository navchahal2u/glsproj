<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vehicles_type".
 *
 * @property integer $id
 * @property string $types
 *
 * @property VehicleInventory[] $vehicleInventories
 */
class VehiclesType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vehicles_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['types'], 'required'],
            [['types'], 'string', 'max' => 25]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'types' => 'Types',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleInventories()
    {
        return $this->hasMany(VehicleInventory::className(), ['type' => 'id']);
    }
}
