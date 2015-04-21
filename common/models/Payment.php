<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "payment".
 */
class Payment extends \common\models\base\Payment
{
    public function afterSave($insert, $changedAttributes)
    {
        if($insert){
            Yii::$app->mailer->compose('paymentCreated', ['payment' =>$this])
                ->setFrom([Yii::$app->params['supportEmail'] => "Lead.Insider"])
                ->setTo(Yii::$app->params['supportEmail'])
                ->setSubject('Запрос выплаты на Lead.Insider')
                ->send();
        }
    }
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'Пользователь'),
            'wmid' => Yii::t('app', 'WMID'),
            'count' => Yii::t('app', 'Сумма'),
            'status' => Yii::t('app', 'Статус запроса'),
        ];
    }
}
