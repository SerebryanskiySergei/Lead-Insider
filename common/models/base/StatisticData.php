<?php

namespace common\models\base;

use Yii;

/**
 * This is the base-model class for table "statistic_data".
 *
 * @property integer $id
 * @property integer $stat_id
 * @property string $data
 * @property string $good_region
 * @property string $status
 *
 * @property Statistic $stat
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
            [['stat_id', 'data'], 'required'],
            [['stat_id'], 'integer'],
            [['data', 'good_region', 'status'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'stat_id' => Yii::t('app', 'Stat ID'),
            'data' => Yii::t('app', 'Data'),
            'good_region' => Yii::t('app', 'Good Region'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStat()
    {
        return $this->hasOne(\common\models\Statistic::className(), ['id' => 'stat_id']);
    }
}
