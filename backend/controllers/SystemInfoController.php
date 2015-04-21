<?php

namespace backend\controllers;

use common\models\SystemInfo;
use common\models\SystemInfoSearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Url;

/**
 * SystemInfoController implements the CRUD actions for SystemInfo model.
 */
class SystemInfoController extends Controller
{
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'rules' => [
					[
						'allow' => true,
						'roles' => ['admin'],
					],
				],
			],

		];
	}
	/**
	 * Lists all SystemInfo models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$data=SystemInfo::find()->all();
		return $this->render('index', [
			'data' => $data,
		]);
	}

	/**
	 * Displays a single SystemInfo model.
	 * @param integer $id
	 * @return mixed
	 */
//	public function actionView($id)
//	{
//        Url::remember();
//        return $this->render('view', [
//			'model' => $this->findModel($id),
//		]);
//	}
//
//	/**
//	 * Creates a new SystemInfo model.
//	 * If creation is successful, the browser will be redirected to the 'view' page.
//	 * @return mixed
//	 */
//	public function actionCreate()
//	{
//		$model = new SystemInfo;
//
//		try {
//            if ($model->load($_POST) && $model->save()) {
//                return $this->redirect(Url::previous());
//            } elseif (!\Yii::$app->request->isPost) {
//                $model->load($_GET);
//            }
//        } catch (\Exception $e) {
//            $msg = (isset($e->errorInfo[2]))?$e->errorInfo[2]:$e->getMessage();
//            $model->addError('_exception', $msg);
//		}
//        return $this->render('create', ['model' => $model,]);
//	}
//
//	/**
//	 * Updates an existing SystemInfo model.
//	 * If update is successful, the browser will be redirected to the 'view' page.
//	 * @param integer $id
//	 * @return mixed
//	 */
//	public function actionUpdate($id)
//	{
//		$model = $this->findModel($id);
//
//		if ($model->load($_POST) && $model->save()) {
//            return $this->redirect(Url::previous());
//		} else {
//			return $this->render('update', [
//				'model' => $model,
//			]);
//		}
//	}
//
//	/**
//	 * Deletes an existing SystemInfo model.
//	 * If deletion is successful, the browser will be redirected to the 'index' page.
//	 * @param integer $id
//	 * @return mixed
//	 */
//	public function actionDelete($id)
//	{
//		$this->findModel($id)->delete();
//		return $this->redirect(Url::previous());
//	}

	/**
	 * Finds the SystemInfo model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return SystemInfo the loaded model
	 * @throws HttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = SystemInfo::findOne($id)) !== null) {
			return $model;
		} else {
			throw new HttpException(404, 'The requested page does not exist.');
		}
	}
}
