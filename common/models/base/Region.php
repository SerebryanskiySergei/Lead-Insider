<?php

namespace common\models\base;

use Yii;

/**
 * This is the base-model class for table "region".
 *
 * @property integer $id
 * @property string $title
 * @property string $ref_cod
 *
 * @property Offer[] $offers
 */
class Region extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'region';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'ref_cod'], 'string', 'max' => 255]
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
            'ref_cod' => Yii::t('app', 'Ref Cod'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOffers()
    {
        return $this->hasMany(\common\models\Offer::className(), ['region_id' => 'id']);
    }
}
