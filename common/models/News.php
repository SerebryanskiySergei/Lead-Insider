<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "news".
 */
class News extends \common\models\base\News
{
    const NOVINKI= 0;
    const STOP_OFFER=1;
    const CHANGE_OFFER=2;
    const NEW_LENDING=3;
    const SYSTEM_TICKETS=4;
    const CHANGES_GEO=5;
    const SALES=6;

    public function rules()
    {
        return [
            [['title', 'text', 'category', 'create_date'], 'required'],
            [['text'], 'string'],
            [['category', 'offer_id'], 'integer'],
            [['title'], 'string', 'max' => 255]
        ];
    }
}
