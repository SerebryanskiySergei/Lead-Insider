<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "system_info".
 */
class SystemInfo extends \common\models\base\SystemInfo
{
        public function rules()
    {
        return [
            [['key', 'value'], 'required'],

        ];
    }
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'key' => Yii::t('app', 'Ключ'),
            'value' => Yii::t('app', 'Значение'),
        ];
    }
}
