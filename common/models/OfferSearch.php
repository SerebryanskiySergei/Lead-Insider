<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Offer;

/**
 * OfferSearch represents the model behind the search form about Offer.
 */
class OfferSearch extends Model
{
	public $id;
	public $title;
	public $action_id;
	public $price;
	public $our_percent;
	public $status;
	public $region_id;
	public $lead;
	public $hold;
	public $access_type_id;
	public $cpe;
	public $postclick;
	public $site;
	public $caption;
	public $traff_1;
	public $traff_2;
	public $traff_3;
	public $traff_4;
	public $traff_5;
	public $traff_6;
	public $traff_7;
	public $traff_8;
	public $traff_9;
	public $traff_10;
	public $traff_11;
	public $create_time;
	public $advertiser_id;

	public function rules()
	{
		return [
			[['id', 'action_id', 'our_percent', 'region_id', 'hold', 'access_type_id', 'postclick', 'advertiser_id'], 'integer'],
			[['title', 'status', 'lead', 'cpe', 'site', 'caption', 'traff_1', 'traff_2', 'traff_3', 'traff_4', 'traff_5', 'traff_6', 'traff_7', 'traff_8', 'traff_9', 'traff_10', 'traff_11', 'create_time'], 'safe'],
			[['price'], 'number'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'title' => 'Название',
			'action_id' => 'Тип действия',
			'price' => 'Полная цена',
			'our_percent' => 'Наши проценты',
			'status' => 'Статус',
			'region_id' => 'Регион',
			'lead' => 'Лид',
			'hold' => 'Холд',
			'access_type_id' => 'Тип доступа',
			'cpe' => 'EPC',
			'postclick' => 'Постклик',
			'site' => 'Сайт',
			'caption' => 'Описание оффера',
			'traff_1' => 'Дорвеи',
			'traff_2' => 'Баннерная реклама',
			'traff_3' => 'Контекстная реклама',
			'traff_4' => 'Контекстная реклама на бренд',
			'traff_5' => 'Тизерная реклама',
			'traff_6' => 'Таргетированная реклама',
			'traff_7' => 'Социальные сети',
			'traff_8' => 'Почтовые рассылки',
			'traff_9' => 'Брокеры',
			'traff_10' => 'Cashback',
			'traff_11' => 'Другое',
			'create_time' => 'Дата добавления',
			'advertiser_id' => 'Рекламодатель',
		];
	}

	public function search($params)
	{
		$query = Offer::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$query->andFilterWhere([
            'id' => $this->id,
            'action_id' => $this->action_id,
            'price' => $this->price,
            'our_percent' => $this->our_percent,
            'region_id' => $this->region_id,
            'hold' => $this->hold,
            'access_type_id' => $this->access_type_id,
            'postclick' => $this->postclick,
            'create_time' => $this->create_time,
            'advertiser_id' => $this->advertiser_id,
        ]);

		$query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'lead', $this->lead])
            ->andFilterWhere(['like', 'cpe', $this->cpe])
            ->andFilterWhere(['like', 'site', $this->site])
            ->andFilterWhere(['like', 'caption', $this->caption])
            ->andFilterWhere(['like', 'traff_1', $this->traff_1])
            ->andFilterWhere(['like', 'traff_2', $this->traff_2])
            ->andFilterWhere(['like', 'traff_3', $this->traff_3])
            ->andFilterWhere(['like', 'traff_4', $this->traff_4])
            ->andFilterWhere(['like', 'traff_5', $this->traff_5])
            ->andFilterWhere(['like', 'traff_6', $this->traff_6])
            ->andFilterWhere(['like', 'traff_7', $this->traff_7])
            ->andFilterWhere(['like', 'traff_8', $this->traff_8])
            ->andFilterWhere(['like', 'traff_9', $this->traff_9])
            ->andFilterWhere(['like', 'traff_10', $this->traff_10])
            ->andFilterWhere(['like', 'traff_11', $this->traff_11]);

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
