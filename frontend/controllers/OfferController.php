<?php

namespace frontend\controllers;

use common\models\base\User;
use common\models\Offer;

use common\models\Statistic;
use yii\web\Controller;
use yii\web\HttpException;

use yii\filters\AccessControl;
use yii\helpers\Url;

/**
 * OfferController implements the CRUD actions for Offer model.
 */
class OfferController extends Controller
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
     * Lists all Offer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $offers = Offer::find()->all();
        Url::remember();
        return $this->render('index', ['offers' => $offers]);
    }

    /**
     * Displays a single Offer model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        Url::remember();
        return $this->render('view', [
            'model' => $this->findModel($id), 'ref' => User::findOne(\Yii::$app->user->getId())->ref,
        ]);
    }


    public function actionStatistic($id){
        $statistic= Statistic::find()->where(['offer_id'=>$id])->all();
        $offer= Offer::find()->where(['id'=>$id])->one();
        return $this->render('statistic',['statistic'=>$statistic,'offer'=>$offer]);
    }

    /**
     * Finds the Offer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Offer the loaded model
     * @throws HttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Offer::findOne($id)) !== null) {
            return $model;
        } else {
            throw new HttpException(404, 'The requested page does not exist.');
        }
    }


}

