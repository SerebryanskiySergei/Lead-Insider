<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Ticket;

/**
 * TicketSearch represents the model behind the search form about Ticket.
 */
class TicketSearch extends Model
{
	public $id;
	public $sender_id;
	public $title;
	public $status;
	public $message;

	public function rules()
	{
		return [
			[['id', 'sender_id'], 'integer'],
			[['title', 'status', 'message'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'sender_id' => 'Sender ID',
			'title' => 'Title',
			'status' => 'Status',
			'message' => 'Message',
		];
	}

	public function search($params)
	{
		$query = Ticket::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$query->andFilterWhere([
            'id' => $this->id,
            'sender_id' => $this->sender_id,
        ]);

		$query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'message', $this->message]);

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
