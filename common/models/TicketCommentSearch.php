<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TicketComment;

/**
 * TicketCommentSearch represents the model behind the search form about TicketComment.
 */
class TicketCommentSearch extends Model
{
	public $id;
	public $ticket_id;
	public $author_id;
	public $text;
	public $create_date;

	public function rules()
	{
		return [
			[['id', 'ticket_id', 'author_id'], 'integer'],
			[['text', 'create_date'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'ticket_id' => 'Ticket ID',
			'author_id' => 'Author ID',
			'text' => 'Text',
			'create_date' => 'Create Date',
		];
	}

	public function search($params)
	{
		$query = TicketComment::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$query->andFilterWhere([
            'id' => $this->id,
            'ticket_id' => $this->ticket_id,
            'author_id' => $this->author_id,
            'create_date' => $this->create_date,
        ]);

		$query->andFilterWhere(['like', 'text', $this->text]);

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
