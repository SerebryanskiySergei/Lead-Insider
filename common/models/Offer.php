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
            'action_id' => Yii::t('app', 'Тип действия'),
            'price' => Yii::t('app', 'Полная цена'),
            'our_percent' => Yii::t('app', 'Наши проценты'),
            'status' => Yii::t('app', 'Статус'),
            'region_id' => Yii::t('app', 'Регион'),
            'lead' => Yii::t('app', 'Лид'),
            'hold' => Yii::t('app', 'Холд'),
            'access_type_id' => Yii::t('app', 'Тип доступа'),
            'cpe' => Yii::t('app', 'EPC'),
            'postclick' => Yii::t('app', 'Постклик'),
            'site' => Yii::t('app', 'Сайт'),
            'caption' => Yii::t('app', 'Описание оффера'),
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
            'create_time' => Yii::t('app', 'Дата добавления'),
            'advertiser_id' => 'Рекламодатель',
        ];
    }
    public function afterSave($insert, $changedAttributes)
    {
        if($insert){
            $offerCount = SystemInfo::findOne(['key'=>'Offer count']);
            $offerCount->value = (int)$offerCount->value +1;
            $offerCount->save();
        }
    }

}
