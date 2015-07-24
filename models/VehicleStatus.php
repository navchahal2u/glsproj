<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vehicle_status".
 *
 * @property integer $id
 * @property string $status_code
 * @property string $status_description
 *
 * @property VehicleInventory[] $vehicleInventories
 */
class VehicleStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vehicle_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status_code'], 'required'],
            [['status_code'], 'string', 'max' => 5],
            [['status_description'], 'string', 'max' => 60],
            [['status_code'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status_code' => 'Status Code',
            'status_description' => 'Status Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleInventories()
    {
        return $this->hasMany(VehicleInventory::className(), ['status' => 'id']);
    }
}
