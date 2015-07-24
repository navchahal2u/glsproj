<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_types".
 *
 * @property integer $id
 * @property string $types
 *
 * @property LoginDetails[] $loginDetails
 */
class UserTypes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_types';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['types'], 'required'],
            [['types'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'types' => 'Types',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoginDetails()
    {
        return $this->hasMany(LoginDetails::className(), ['user_type' => 'id']);
    }
}
