<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vehicle_history".
 *
 * @property integer $id
 * @property integer $vehicleId
 * @property string $received_date
 * @property string $received_mileage
 * @property integer $received_by
 * @property string $released_date
 * @property string $released_mileage
 * @property string $date_added
 *
 * @property LoginDetails $receivedBy
 * @property VehicleInventory $vehicle
 */
class VehicleHistory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vehicle_history';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vehicleId', 'received_date', 'received_mileage', 'received_by'], 'required'],
            [['vehicleId', 'received_by'], 'integer'],
            [['received_date', 'released_date', 'date_added'], 'safe'],
            [['received_mileage', 'released_mileage'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vehicleId' => 'Vehicle ID',
            'received_date' => 'Received Date',
            'received_mileage' => 'Received Mileage',
            'received_by' => 'Received By',
            'released_date' => 'Released Date',
            'released_mileage' => 'Released Mileage',
            'date_added' => 'Date Added',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReceivedBy()
    {
        return $this->hasOne(LoginDetails::className(), ['id' => 'received_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicle()
    {
        return $this->hasOne(VehicleInventory::className(), ['id' => 'vehicleId']);
    }
}
