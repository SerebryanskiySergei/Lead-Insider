<?php

namespace common\models\base;

use Yii;

/**
 * This is the base-model class for table "access_type".
 *
 * @property integer $id
 * @property string $title
 *
 * @property Offer[] $offers
 */
class AccessType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'access_type';
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
        return $this->hasMany(\common\models\Offer::className(), ['access_type_id' => 'id']);
    }
}
