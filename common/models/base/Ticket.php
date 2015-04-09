<?php

namespace common\models\base;

use Yii;

/**
 * This is the base-model class for table "ticket".
 *
 * @property integer $id
 * @property integer $sender_id
 * @property string $title
 * @property string $status
 * @property string $message
 *
 * @property User $sender
 * @property TicketComment[] $ticketComments
 */
class Ticket extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ticket';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sender_id', 'title', 'status', 'message'], 'required'],
            [['sender_id'], 'integer'],
            [['message'], 'string'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'sender_id' => Yii::t('app', 'Sender ID'),
            'title' => Yii::t('app', 'Title'),
            'status' => Yii::t('app', 'Status'),
            'message' => Yii::t('app', 'Message'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSender()
    {
        return $this->hasOne(\common\models\User::className(), ['id' => 'sender_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTicketComments()
    {
        return $this->hasMany(\common\models\TicketComment::className(), ['ticket_id' => 'id']);
    }
}
