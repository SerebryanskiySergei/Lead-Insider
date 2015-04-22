<?php

namespace common\models\base;

use Yii;

/**
 * This is the base-model class for table "offer".
 *
 * @property integer $id
 * @property string $title
 * @property integer $action_id
 * @property double $price
 * @property integer $our_percent
 * @property string $status
 * @property integer $region_id
 * @property string $lead
 * @property integer $hold
 * @property integer $access_type_id
 * @property string $cpe
 * @property integer $postclick
 * @property string $site
 * @property string $caption
 * @property string $traff_1
 * @property string $traff_2
 * @property string $traff_3
 * @property string $traff_4
 * @property string $traff_5
 * @property string $traff_6
 * @property string $traff_7
 * @property string $traff_8
 * @property string $traff_9
 * @property string $traff_10
 * @property string $traff_11
 * @property string $create_time
 * @property integer $advertiser_id
 *
 * @property News[] $news
 * @property AccessType $accessType
 * @property OfferAction $action
 * @property Region $region
 * @property User $advertiser
 * @property Statistic[] $statistics
 */
class Offer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'offer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'action_id', 'price', 'region_id', 'lead', 'hold', 'access_type_id', 'cpe', 'postclick', 'site', 'caption', 'traff_1', 'traff_2', 'traff_3', 'traff_4', 'traff_5', 'traff_6', 'traff_7', 'traff_8', 'traff_9', 'traff_10', 'traff_11', 'create_time'], 'required'],
            [['action_id', 'our_percent', 'region_id', 'hold', 'access_type_id', 'postclick', 'advertiser_id'], 'integer'],
            [['price'], 'number'],
            [['status', 'caption', 'traff_1', 'traff_2', 'traff_3', 'traff_4', 'traff_5', 'traff_6', 'traff_7', 'traff_8', 'traff_9', 'traff_10', 'traff_11'], 'string'],
            [['create_time'], 'safe'],
            [['title', 'lead', 'cpe', 'site'], 'string', 'max' => 255]
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
            'action_id' => Yii::t('app', 'Action ID'),
            'price' => Yii::t('app', 'Price'),
            'our_percent' => Yii::t('app', 'Our Percent'),
            'status' => Yii::t('app', 'Status'),
            'region_id' => Yii::t('app', 'Region ID'),
            'lead' => Yii::t('app', 'Lead'),
            'hold' => Yii::t('app', 'Hold'),
            'access_type_id' => Yii::t('app', 'Access Type ID'),
            'cpe' => Yii::t('app', 'Cpe'),
            'postclick' => Yii::t('app', 'Postclick'),
            'site' => Yii::t('app', 'Site'),
            'caption' => Yii::t('app', 'Caption'),
            'traff_1' => Yii::t('app', 'Traff 1'),
            'traff_2' => Yii::t('app', 'Traff 2'),
            'traff_3' => Yii::t('app', 'Traff 3'),
            'traff_4' => Yii::t('app', 'Traff 4'),
            'traff_5' => Yii::t('app', 'Traff 5'),
            'traff_6' => Yii::t('app', 'Traff 6'),
            'traff_7' => Yii::t('app', 'Traff 7'),
            'traff_8' => Yii::t('app', 'Traff 8'),
            'traff_9' => Yii::t('app', 'Traff 9'),
            'traff_10' => Yii::t('app', 'Traff 10'),
            'traff_11' => Yii::t('app', 'Traff 11'),
            'create_time' => Yii::t('app', 'Create Time'),
            'advertiser_id' => Yii::t('app', 'Advertiser ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasMany(\common\models\News::className(), ['offer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccessType()
    {
        return $this->hasOne(\common\models\AccessType::className(), ['id' => 'access_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAction()
    {
        return $this->hasOne(\common\models\OfferAction::className(), ['id' => 'action_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(\common\models\Region::className(), ['id' => 'region_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdvertiser()
    {
        return $this->hasOne(\common\models\User::className(), ['id' => 'advertiser_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatistics()
    {
        return $this->hasMany(\common\models\Statistic::className(), ['offer_id' => 'id']);
    }
}
