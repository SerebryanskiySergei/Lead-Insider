<?php

namespace common\models\base;

use Yii;

/**
 * This is the base-model class for table "statistic_data".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $offer_id
 * @property string $data
 * @property string $good_region
 *
 * @property Offer $offer
 * @property User $user
 */
class StatisticData extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'statistic_data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['id', 'user//_id', 'offer_id', 'data'], 'required'],
//            [['id', 'user_id', 'offer_id'], 'integer'],
//            [['data', 'good_region'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'offer_id' => Yii::t('app', 'Offer ID'),
            'data' => Yii::t('app', 'Data'),
            'good_region' => Yii::t('app', 'Good Region'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOffer()
    {
        return $this->hasOne(\common\models\Offer::className(), ['id' => 'offer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\common\models\User::className(), ['id' => 'user_id']);
    }
}
