<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vehicle_plate_number".
 *
 * @property integer $id
 * @property string $plate_number
 * @property string $plate_installed
 * @property integer $type
 * @property string $expiration
 * @property integer $status
 * @property string $comments
 *
 * @property VehiclePlatingStatus $status0
 * @property VehiclePlatingType $type0
 * @property VehicleShipping[] $vehicleShippings
 */
class VehiclePlateNumber extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vehicle_plate_number';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['plate_number', 'plate_installed', 'type', 'expiration', 'status'], 'required'],
            [['plate_installed', 'expiration'], 'safe'],
            [['type', 'status'], 'integer'],
            [['comments'], 'string'],
            [['plate_number'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'plate_number' => 'Plate Number',
            'plate_installed' => 'Plate Installed',
            'type' => 'Type',
            'expiration' => 'Expiration',
            'status' => 'Status',
            'comments' => 'Comments',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus0()
    {
        return $this->hasOne(VehiclePlatingStatus::className(), ['id' => 'status']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType0()
    {
        return $this->hasOne(VehiclePlatingType::className(), ['id' => 'type']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleShippings()
    {
        return $this->hasMany(VehicleShipping::className(), ['vehicle_plate' => 'id']);
    }
}
