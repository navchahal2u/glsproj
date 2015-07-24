<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_login_log".
 *
 * @property integer $id
 * @property integer $userId
 * @property string $login_date
 * @property string $login_time
 * @property string $loginIp
 * @property string $logout_date
 * @property string $logout_time
 *
 * @property LoginDetails $user
 */
class UserLoginLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_login_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userId', 'login_date', 'login_time', 'loginIp'], 'required'],
            [['userId'], 'integer'],
            [['login_date', 'login_time', 'logout_date', 'logout_time'], 'safe'],
            [['loginIp'], 'string', 'max' => 60]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userId' => 'User ID',
            'login_date' => 'Login Date',
            'login_time' => 'Login Time',
            'loginIp' => 'Login Ip',
            'logout_date' => 'Logout Date',
            'logout_time' => 'Logout Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(LoginDetails::className(), ['id' => 'userId']);
    }
}
