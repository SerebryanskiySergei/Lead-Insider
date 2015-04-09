<?php

namespace common\models\base;

use Yii;

/**
 * This is the base-model class for table "ticket_comment".
 *
 * @property integer $id
 * @property integer $ticket_id
 * @property integer $author_id
 * @property string $text
 * @property string $create_date
 *
 * @property Ticket $ticket
 * @property User $author
 */
class TicketComment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ticket_comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ticket_id', 'author_id', 'text', 'create_date'], 'required'],
            [['ticket_id', 'author_id'], 'integer'],
            [['text'], 'string'],
            [['create_date'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'ticket_id' => Yii::t('app', 'Ticket ID'),
            'author_id' => Yii::t('app', 'Author ID'),
            'text' => Yii::t('app', 'Text'),
            'create_date' => Yii::t('app', 'Create Date'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTicket()
    {
        return $this->hasOne(\common\models\Ticket::className(), ['id' => 'ticket_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(\common\models\User::className(), ['id' => 'author_id']);
    }
}
