<?php

namespace frontend\controllers;

use common\models\Offer;
use common\models\Statistic;
use common\models\Ticket;
use common\models\User;
use common\models\UserSearch;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\HttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Url;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    public $layout = 'with_menu';


    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['webmaster'],
                    ],
                ],
            ],
        ];
    }

	/**
	 * Displays a single User model.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionView($id)
	{
        Url::remember();
        return $this->render('view', [
			'model' => $this->findModel($id),
		]);
	}

	/**
	 * Updates an existing User model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id)
	{
		$model = $this->findModel($id);

//        var_dump($model->validate());exit;
		if ($model->load($_POST) && $model->save()) {
            return $this->redirect(Url::previous());
		} else {
			return $this->render('update', [
				'model' => $model,
			]);
		}
	}

    public function actionAllstatistic(){
		if(Yii::$app->user->can('advertboard'))
			$statistic= Statistic::find()->where(['offer_id'=>
				Offer::find()->where(['advertiser_id'=>Yii::$app->user->id])->select('id')->column()
			])->all();
		else
			$statistic= Statistic::find()->where(['user_ref_id'=>\Yii::$app->user->id])->all();
        return $this->render('statistic',['statistic'=>$statistic]);
    }

    public function actionFaq(){
        return $this->render('faq');
    }

	/**
	 * Finds the User model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return User the loaded model
	 * @throws HttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = User::findOne($id)) !== null) {
			return $model;
		} else {
			throw new HttpException(404, 'The requested page does not exist.');
		}
	}
}
