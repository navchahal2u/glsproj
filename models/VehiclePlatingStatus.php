<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vehicle_plating_status".
 *
 * @property integer $id
 * @property string $plate_status
 *
 * @property VehiclePlateNumber[] $vehiclePlateNumbers
 */
class VehiclePlatingStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vehicle_plating_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['plate_status'], 'required'],
            [['plate_status'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'plate_status' => 'Plate Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehiclePlateNumbers()
    {
        return $this->hasMany(VehiclePlateNumber::className(), ['status' => 'id']);
    }
}
