<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vehicle_inventory".
 *
 * @property integer $id
 * @property string $vin
 * @property string $model
 * @property string $make
 * @property string $year
 * @property string $color
 * @property integer $type
 * @property integer $coordinator
 * @property integer $status
 * @property integer $restricted
 *
 * @property VehicleHistory[] $vehicleHistories
 * @property VehicleStatus $status0
 * @property VehiclesType $type0
 * @property LoginDetails $coordinator0
 * @property VehicleShipping[] $vehicleShippings
 */
class VehicleInventory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vehicle_inventory';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vin', 'model', 'make', 'year', 'color', 'type', 'status', 'restricted'], 'required'],
            [['year'], 'safe'],
            [['type', 'coordinator', 'status', 'restricted'], 'integer'],
            [['vin'], 'string', 'max' => 40],
            [['model'], 'string', 'max' => 30],
            [['make'], 'string', 'max' => 25],
            [['color'], 'string', 'max' => 15],
            [['vin'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vin' => 'Vin',
            'model' => 'Model',
            'make' => 'Make',
            'year' => 'Year',
            'color' => 'Color',
            'type' => 'Type',
            'coordinator' => 'Coordinator',
            'status' => 'Status',
            'restricted' => '0:no
1:yes',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleHistories()
    {
        return $this->hasMany(VehicleHistory::className(), ['vehicleId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus0()
    {
        return $this->hasOne(VehicleStatus::className(), ['id' => 'status']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType0()
    {
        return $this->hasOne(VehiclesType::className(), ['id' => 'type']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCoordinator0()
    {
        return $this->hasOne(LoginDetails::className(), ['id' => 'coordinator']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleShippings()
    {
        return $this->hasMany(VehicleShipping::className(), ['vehicleId' => 'id']);
    }
}
