<?php

namespace frontend\controllers;

use common\models\TicketComment;
use yii\web\Controller;
use yii\web\HttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Url;

/**
 * TicketCommentController implements the CRUD actions for TicketComment model.
 */
class TicketCommentController extends Controller
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
	public function actionCreate()
	{
		$model = new TicketComment;

		try {
            if ($model->load($_POST) ) {
                $model->create_date = new \DateTime('now');
                $model->create_date = $model->create_date->format('Y-m-d H:i:s');
                $model->author_id=\Yii::$app->user->getId();
                if($model->save())
                    return $this->redirect(Url::toRoute(['ticket/view','id'=>$model->ticket_id]));
            } elseif (!\Yii::$app->request->isPost) {
                $model->load($_GET);
            }
        } catch (\Exception $e) {
            $msg = (isset($e->errorInfo[2]))?$e->errorInfo[2]:$e->getMessage();
            $model->addError('_exception', $msg);
		}
        return $this->redirect(Url::toRoute(['ticket/view','id'=>$model->ticket_id]));
	}

	/**
	 * Updates an existing TicketComment model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id)
	{
		$model = $this->findModel($id);

		if ($model->load($_POST) && $model->save()) {
            return $this->redirect(Url::previous());
		} else {
			return $this->render('update', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Deletes an existing TicketComment model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionDelete($id)
	{
		$this->findModel($id)->delete();
		return $this->redirect(Url::previous());
	}

	/**
	 * Finds the TicketComment model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return TicketComment the loaded model
	 * @throws HttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = TicketComment::findOne($id)) !== null) {
			return $model;
		} else {
			throw new HttpException(404, 'The requested page does not exist.');
		}
	}
}
