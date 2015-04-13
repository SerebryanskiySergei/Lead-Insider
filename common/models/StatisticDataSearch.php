<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\StatisticData;

/**
 * StatisticDataSearch represents the model behind the search form about StatisticData.
 */
class StatisticDataSearch extends Model
{
	public $id;
	public $stat_id;
	public $data;
	public $good_region;
	public $status;

	public function rules()
	{
		return [
			[['id', 'stat_id'], 'integer'],
			[['data', 'good_region', 'status'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'stat_id' => 'Stat ID',
			'data' => 'Data',
			'good_region' => 'Good Region',
			'status' => 'Status',
		];
	}

	public function search($params)
	{
		$query = StatisticData::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$query->andFilterWhere([
            'id' => $this->id,
            'stat_id' => $this->stat_id,
        ]);

		$query->andFilterWhere(['like', 'data', $this->data])
            ->andFilterWhere(['like', 'good_region', $this->good_region])
            ->andFilterWhere(['like', 'status', $this->status]);

		return $dataProvider;
	}

	protected function addCondition($query, $attribute, $partialMatch = false)
	{
		$value = $this->$attribute;
		if (trim($value) === '') {
			return;
		}
		if ($partialMatch) {
			$value = '%' . strtr($value, ['%'=>'\%', '_'=>'\_', '\\'=>'\\\\']) . '%';
			$query->andWhere(['like', $attribute, $value]);
		} else {
			$query->andWhere([$attribute => $value]);
		}
	}
}
