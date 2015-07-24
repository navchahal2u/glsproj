<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vehicle_shipping".
 *
 * @property integer $id
 * @property integer $vehicleId
 * @property string $vdate
 * @property integer $who
 * @property string $scheduled_date
 * @property string $scheduled_time
 * @property integer $vehicle_plate
 * @property integer $event
 * @property integer $vehicle_returned
 * @property string $comments
 *
 * @property Events $event0
 * @property VehiclePlateNumber $vehiclePlate
 * @property VehicleInventory $vehicle
 */
class VehicleShipping extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vehicle_shipping';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vehicleId', 'who', 'vehicle_plate', 'event'], 'required'],
            [['vehicleId', 'who', 'vehicle_plate', 'event', 'vehicle_returned'], 'integer'],
            [['vdate', 'scheduled_date', 'scheduled_time'], 'safe'],
            [['comments'], 'string']
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
            'vdate' => 'Vdate',
            'who' => 'Who',
            'scheduled_date' => 'Scheduled Date',
            'scheduled_time' => 'Scheduled Time',
            'vehicle_plate' => 'Vehicle Plate',
            'event' => 'Event',
            'vehicle_returned' => 'Vehicle Returned',
            'comments' => 'Comments',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvent0()
    {
        return $this->hasOne(Events::className(), ['id' => 'event']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehiclePlate()
    {
        return $this->hasOne(VehiclePlateNumber::className(), ['id' => 'vehicle_plate']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicle()
    {
        return $this->hasOne(VehicleInventory::className(), ['id' => 'vehicleId']);
    }
}
