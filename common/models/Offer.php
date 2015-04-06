<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "offer".
 */
class Offer extends \common\models\base\Offer
{
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Название'),
            'action_id' => Yii::t('app', 'Действие'),
            'price' => Yii::t('app', 'Цена'),
            'region' => Yii::t('app', 'Регион'),
            'lead' => Yii::t('app', 'Лид'),
            'hold' => Yii::t('app', 'Холд'),
            'access_type_id' => Yii::t('app', 'Тип доступа'),
            'epc' => Yii::t('app', 'CPE'),
            'postclick' => Yii::t('app', 'Постклик'),
            'site' => Yii::t('app', 'Сайт'),
            'caption' => Yii::t('app', 'Описание'),
            'traff_1' => Yii::t('app', 'Дорвеи'),
            'traff_2' => Yii::t('app', 'Баннерная реклама'),
            'traff_3' => Yii::t('app', 'Контекстная реклама'),
            'traff_4' => Yii::t('app', 'Контекстная реклама на бренд'),
            'traff_5' => Yii::t('app', 'Тизерная реклама'),
            'traff_6' => Yii::t('app', 'Таргетированная реклама'),
            'traff_7' => Yii::t('app', 'Социальные сети'),
            'traff_8' => Yii::t('app', 'Почтовые рассылки'),
            'traff_9' => Yii::t('app', 'Брокеры'),
            'traff_10' => Yii::t('app', 'Cashback'),
            'traff_11' => Yii::t('app', 'Другое'),
            'create_time' => Yii::t('app', 'Дата создания'),
        ];
    }
}
