<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\News;

/**
 * NewsSearch represents the model behind the search form about News.
 */
class NewsSearch extends Model
{
	public $id;
	public $title;
	public $text;
	public $category;
	public $create_date;
	public $offer_id;

	public function rules()
	{
		return [
			[['id', 'category', 'offer_id'], 'integer'],
			[['title', 'text', 'create_date'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'title' => 'Title',
			'text' => 'Text',
			'category' => 'Category',
			'create_date' => 'Create Date',
			'offer_id' => 'Offer ID',
		];
	}

	public function search($params)
	{
		$query = News::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$query->andFilterWhere([
            'id' => $this->id,
            'category' => $this->category,
            'create_date' => $this->create_date,
            'offer_id' => $this->offer_id,
        ]);

		$query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'text', $this->text]);

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
