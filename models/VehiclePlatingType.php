<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vehicle_plating_type".
 *
 * @property integer $id
 * @property string $plate_type
 *
 * @property VehiclePlateNumber[] $vehiclePlateNumbers
 */
class VehiclePlatingType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vehicle_plating_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['plate_type'], 'required'],
            [['plate_type'], 'string', 'max' => 25]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'plate_type' => 'Plate Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehiclePlateNumbers()
    {
        return $this->hasMany(VehiclePlateNumber::className(), ['type' => 'id']);
    }
}
