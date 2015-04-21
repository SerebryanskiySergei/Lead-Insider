<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ticket_comment".
 */
class TicketComment extends \common\models\base\TicketComment
{
    public function afterSave($insert, $changedAttributes)
    {
        if($insert){
            if($this->author_id==$this->ticket->sender_id)
            Yii::$app->mailer->compose('userComment', ['ticketComment' =>$this])
                ->setFrom([Yii::$app->params['supportEmail'] => "Lead.Insider"])
                ->setTo(Yii::$app->params['supportEmail'])
                ->setSubject('Коммент к тикету на Lead.Insider')
                ->send();
            else
                Yii::$app->mailer->compose('supportComment', ['ticketComment' =>$this])
                    ->setFrom([Yii::$app->params['supportEmail'] => "Lead.Insider"])
                    ->setTo($this->ticket->sender->email)
                    ->setSubject('Получен ответ от поддержки на Lead.Insider')
                    ->send();
        }
    }
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'ticket_id' => Yii::t('app', 'Тикет'),
            'author_id' => Yii::t('app', 'Отправитель сообщения'),
            'text' => Yii::t('app', 'Сообщение'),
            'create_date' => Yii::t('app', 'Дата публикации'),
        ];
    }
}
