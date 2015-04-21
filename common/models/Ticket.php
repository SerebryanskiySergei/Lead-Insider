<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ticket".
 */
class Ticket extends \common\models\base\Ticket
{
    const STATUS_WAITING_ANSWER = 0;
    const STATUS_HAVE_ANSWER = 1;
    public function rules()
    {
        return [
            [['sender_id', 'title', 'status', 'message'], 'required'],
            [['sender_id'], 'integer'],
            [['message'], 'string'],
            [['title'], 'string', 'max' => 255]
        ];
    }
    public function afterSave($insert, $changedAttributes)
    {
        if($insert){
            Yii::$app->mailer->compose('ticketCreated', ['ticket' =>$this])
                ->setFrom([Yii::$app->params['supportEmail'] => "Lead.Insider"])
                ->setTo(Yii::$app->params['supportEmail'])
                ->setSubject('Создан тикет на Lead.Insider')
                ->send();
        }
    }
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'sender_id' => Yii::t('app', 'Отправитель'),
            'title' => Yii::t('app', 'Заголовок'),
            'status' => Yii::t('app', 'Статус'),
            'message' => Yii::t('app', 'Сообщение'),
        ];
    }
}
