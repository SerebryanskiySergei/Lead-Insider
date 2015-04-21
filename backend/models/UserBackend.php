<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "User".
 */
class UserBackend extends \common\models\User
{

    public function rules()
    {
        return [
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => self::className(), 'message' => 'This email address has already been taken.'],
            ['email', 'string', 'max' => 255],

            ['status', 'integer'],
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => array_keys(self::getStatusesArray())],

            [['name','surname','phone','role','status'],'safe']
        ];
    }
}