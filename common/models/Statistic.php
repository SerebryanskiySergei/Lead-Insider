<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "statistic".
 */
class Statistic extends \common\models\base\Statistic
{
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'offer_id' => Yii::t('app', 'Оффер'),
            'user_ref_id' => Yii::t('app', 'Вебмастер'),
            'date' => Yii::t('app', 'Дата'),
            'hits' => Yii::t('app', 'Хиты'),
            'visitors' => Yii::t('app', 'Посетители'),
            'tb' => Yii::t('app', 'ТБ'),
            'leads' => Yii::t('app', 'Лиды'),
            'confirmed' => Yii::t('app', 'Подтв.'),
            'question' => Yii::t('app', 'Неподтв.'),
            'warning' => Yii::t('app', 'Заблок.'),
            'hold' => Yii::t('app', 'Холд'),
            'profit' => Yii::t('app', 'Профит'),
        ];
    }
}
