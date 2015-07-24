<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "events".
 *
 * @property integer $id
 * @property string $event_name
 * @property string $organized_by
 * @property string $event_date
 * @property string $event_time
 * @property string $location
 *
 * @property VehicleShipping[] $vehicleShippings
 */
class Events extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'events';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['event_name', 'event_date'], 'required'],
            [['event_date', 'event_time'], 'safe'],
            [['location'], 'string'],
            [['event_name'], 'string', 'max' => 75],
            [['organized_by'], 'string', 'max' => 60]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'event_name' => 'Event Name',
            'organized_by' => 'Organized By',
            'event_date' => 'Event Date',
            'event_time' => 'Event Time',
            'location' => 'Location',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleShippings()
    {
        return $this->hasMany(VehicleShipping::className(), ['event' => 'id']);
    }
}
