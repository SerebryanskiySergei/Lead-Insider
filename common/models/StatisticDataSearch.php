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
	public $user_id;
	public $offer_id;
	public $data;

	public function rules()
	{
		return [
			[['id', 'user_id', 'offer_id'], 'integer'],
			[['data'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'user_id' => 'User ID',
			'offer_id' => 'Offer ID',
			'data' => 'Data',
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
            'user_id' => $this->user_id,
            'offer_id' => $this->offer_id,
        ]);

		$query->andFilterWhere(['like', 'data', $this->data]);

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
