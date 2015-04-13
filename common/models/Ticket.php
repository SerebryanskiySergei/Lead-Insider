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
}
