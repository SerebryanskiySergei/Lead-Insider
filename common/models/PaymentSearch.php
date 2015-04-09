<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Payment;

/**
 * PaymentSearch represents the model behind the search form about Payment.
 */
class PaymentSearch extends Model
{
	public $id;
	public $user_id;
	public $wmid;
	public $count;
	public $status;

	public function rules()
	{
		return [
			[['id', 'user_id'], 'integer'],
			[['wmid', 'count', 'status'], 'safe'],
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
			'wmid' => 'Wmid',
			'count' => 'Count',
			'status' => 'Status',
		];
	}

	public function search($params)
	{
		$query = Payment::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
        ]);

		$query->andFilterWhere(['like', 'wmid', $this->wmid])
            ->andFilterWhere(['like', 'count', $this->count])
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
