<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "login_details".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property integer $status
 * @property integer $user_type
 *
 * @property UserTypes $userType
 * @property PersonalDetails[] $personalDetails
 * @property UserLoginLog[] $userLoginLogs
 * @property VehicleHistory[] $vehicleHistories
 * @property VehicleInventory[] $vehicleInventories
 */
class LoginDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'login_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'status', 'user_type'], 'required'],
            [['status', 'user_type'], 'integer'],
            [['username'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 128],
            [['username'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'status' => '0: active
1: inactive
2: authorized
3: blocked
4: password',
            'user_type' => 'User Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserType()
    {
        return $this->hasOne(UserTypes::className(), ['id' => 'user_type']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonalDetails()
    {
        return $this->hasMany(PersonalDetails::className(), ['userId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserLoginLogs()
    {
        return $this->hasMany(UserLoginLog::className(), ['userId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleHistories()
    {
        return $this->hasMany(VehicleHistory::className(), ['received_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleInventories()
    {
        return $this->hasMany(VehicleInventory::className(), ['coordinator' => 'id']);
    }
}
