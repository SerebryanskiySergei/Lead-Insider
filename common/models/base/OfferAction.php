<?php

namespace common\models\base;

use Yii;

/**
 * This is the base-model class for table "offer_action".
 *
 * @property integer $id
 * @property string $title
 *
 * @property Offer[] $offers
 */
class OfferAction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'offer_action';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOffers()
    {
        return $this->hasMany(\common\models\Offer::className(), ['action_id' => 'id']);
    }
}
