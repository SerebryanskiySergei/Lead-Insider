<?php

namespace frontend\controllers;

use common\models\Ticket;
use common\models\TicketSearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Url;

/**
 * TicketController implements the CRUD actions for Ticket model.
 */
class TicketController extends Controller
{
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
    public $layout = 'with_menu';
	/**
	 * Lists all Ticket models.
	 * @return mixed
	 */
	public function actionIndex()
	{
        $newticket = new Ticket();
        $tickets = Ticket::find()->where(['sender_id'=>\Yii::$app->user->getId()])->all();
        return $this->render('index',['tickets'=>$tickets,'model'=>$newticket]);
	}

	/**
	 * Displays a single Ticket model.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionView($id)
	{
        $ticket=Ticket::findOne($id);
        $comments = \common\models\TicketComment::find()->where(['ticket_id'=>$id])->all();
        return $this->render('view',['ticket'=>$ticket,'comments'=>$comments]);
	}

	/**
	 * Creates a new Ticket model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new Ticket;
		try {
            if ($model->load($_POST)) {
                $model->sender_id=\Yii::$app->user->getId();
                $model->status=Ticket::STATUS_WAITING_ANSWER;
                if($model->save())
                    return $this->redirect(Url::toRoute('ticket/index'));
            } elseif (!\Yii::$app->request->isPost) {
                $model->load($_GET);
            }
        } catch (\Exception $e) {
            $msg = (isset($e->errorInfo[2]))?$e->errorInfo[2]:$e->getMessage();
            $model->addError('_exception', $msg);
		}
        return $this->redirect(Url::toRoute('ticket/index'));
	}

	/**
	 * Updates an existing Ticket model.
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
	 * Deletes an existing Ticket model.
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
	 * Finds the Ticket model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return Ticket the loaded model
	 * @throws HttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = Ticket::findOne($id)) !== null) {
			return $model;
		} else {
			throw new HttpException(404, 'The requested page does not exist.');
		}
	}
}
