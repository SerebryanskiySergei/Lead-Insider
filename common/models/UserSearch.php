<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\User;

/**
 * UserSearch represents the model behind the search form about User.
 */
class UserSearch extends Model
{
	public $id;
	public $username;
	public $password_hash;
	public $auth_key;
	public $password_reset_token;
	public $email;
	public $status;
	public $created_at;
	public $updated_at;
	public $name;
	public $surname;
	public $phone;
	public $balance;

	public function rules()
	{
		return [
			[['id', 'status', 'created_at', 'updated_at'], 'integer'],
			[['username', 'password_hash', 'auth_key', 'password_reset_token', 'email', 'name', 'surname', 'phone'], 'safe'],
			[['balance'], 'number'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'username' => 'Логин',
			'password_hash' => 'Password Hash',
			'auth_key' => 'Auth Key',
			'password_reset_token' => 'Password Reset Token',
			'email' => 'Email',
			'status' => 'Активен/Неактивен',
			'created_at' => 'Дата добавления',
			'updated_at' => 'Дата обновления',
			'name' => 'Имя',
			'surname' => 'Фамилия',
			'phone' => 'Телефон',
			'balance' => 'Balance',
		];
	}

	public function search($params)
	{
		$query = User::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}

		$query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'balance' => $this->balance,
        ]);

		$query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'surname', $this->surname])
            ->andFilterWhere(['like', 'phone', $this->phone]);

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
