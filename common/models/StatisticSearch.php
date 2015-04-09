<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Statistic;

/**
 * StatisticSearch represents the model behind the search form about Statistic.
 */
class StatisticSearch extends Model
{
	public $id;
	public $offer_id;
	public $user_ref_id;
	public $date;
	public $hits;
	public $visitors;
	public $tb;
	public $leads;
	public $confirmed;
	public $question;
	public $warning;
	public $hold;
	public $profit;

	public function rules()
	{
		return [
			[['id', 'offer_id', 'user_ref_id', 'hits', 'visitors', 'tb', 'leads', 'confirmed', 'question', 'warning', 'hold', 'profit'], 'integer'],
			[['date'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'offer_id' => 'Offer ID',
			'user_ref_id' => 'User Ref ID',
			'date' => 'Date',
			'hits' => 'Hits',
			'visitors' => 'Visitors',
			'tb' => 'Tb',
			'leads' => 'Leads',
			'confirmed' => 'Confirmed',
			'question' => 'Question',
			'warning' => 'Warning',
			'hold' => 'Hold',
			'profit' => 'Profit',
		];
	}

	public function search($params)
	{
		$query = Statistic::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$query->andFilterWhere([
            'id' => $this->id,
            'offer_id' => $this->offer_id,
            'user_ref_id' => $this->user_ref_id,
            'date' => $this->date,
            'hits' => $this->hits,
            'visitors' => $this->visitors,
            'tb' => $this->tb,
            'leads' => $this->leads,
            'confirmed' => $this->confirmed,
            'question' => $this->question,
            'warning' => $this->warning,
            'hold' => $this->hold,
            'profit' => $this->profit,
        ]);

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
