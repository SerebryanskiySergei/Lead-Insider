<?php

namespace common\models\base;

use Yii;

/**
 * This is the base-model class for table "news".
 *
 * @property integer $id
 * @property string $title
 * @property string $text
 * @property integer $category
 * @property string $create_date
 * @property integer $offer_id
 *
 * @property Offer $offer
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'text', 'category', 'create_date'], 'required'],
            [['text'], 'string'],
            [['category', 'offer_id'], 'integer'],
            [['create_date'], 'safe'],
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
            'title' => Yii::t('app', 'Title'),
            'text' => Yii::t('app', 'Text'),
            'category' => Yii::t('app', 'Category'),
            'create_date' => Yii::t('app', 'Create Date'),
            'offer_id' => Yii::t('app', 'Offer ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOffer()
    {
        return $this->hasOne(\common\models\Offer::className(), ['id' => 'offer_id']);
    }
}
