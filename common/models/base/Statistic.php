<?php

namespace common\models\base;

use Yii;

/**
 * This is the base-model class for table "statistic".
 *
 * @property integer $id
 * @property integer $offer_id
 * @property integer $user_ref_id
 * @property string $date
 * @property integer $hits
 * @property integer $visitors
 * @property integer $tb
 * @property integer $leads
 * @property integer $confirmed
 * @property integer $question
 * @property integer $warning
 * @property integer $hold
 * @property integer $profit
 *
 * @property Offer $offer
 * @property User $userRef
 * @property StatisticData[] $statisticDatas
 */
class Statistic extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'statistic';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['offer_id', 'user_ref_id', 'hits', 'visitors', 'tb', 'leads', 'confirmed', 'question', 'warning', 'hold', 'profit'], 'integer'],
            [['date'], 'required'],
            [['date','leads'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'offer_id' => Yii::t('app', 'Offer ID'),
            'user_ref_id' => Yii::t('app', 'User Ref ID'),
            'date' => Yii::t('app', 'Date'),
            'hits' => Yii::t('app', 'Hits'),
            'visitors' => Yii::t('app', 'Visitors'),
            'tb' => Yii::t('app', 'Tb'),
            'leads' => Yii::t('app', 'Leads'),
            'confirmed' => Yii::t('app', 'Confirmed'),
            'question' => Yii::t('app', 'Question'),
            'warning' => Yii::t('app', 'Warning'),
            'hold' => Yii::t('app', 'Hold'),
            'profit' => Yii::t('app', 'Profit'),
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
    public function getUserRef()
    {
        return $this->hasOne(\common\models\User::className(), ['id' => 'user_ref_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatisticDatas()
    {
        return $this->hasMany(\common\models\StatisticData::className(), ['stat_id' => 'id']);
    }
}
