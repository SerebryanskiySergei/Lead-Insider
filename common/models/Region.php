<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "region".
 */
class Region extends \common\models\base\Region
{
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Название'),
            'ref_cod' => Yii::t('app', 'Код региона в реферальной ссылке'),
        ];
    }
}
