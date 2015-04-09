<?php

namespace backend\controllers;

use common\models\base\Offer;
use common\models\Statistic;
use common\models\StatisticData;
use common\models\StatisticSearch;
use Faker\Provider\cs_CZ\DateTime;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\HttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\JsonResponseFormatter;
use yii\web\Response;
use yii\web\User;

/**
 * StatisticController implements the CRUD actions for Statistic model.
 */
class StatisticController extends Controller
{

    /**
     * Lists all Statistic models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StatisticSearch;
        $dataProvider = $searchModel->search($_GET);

        Url::remember();
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single Statistic model.
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
     * Creates a new Statistic model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Statistic;

        try {
            if ($model->load($_POST) && $model->save()) {
                return $this->redirect(Url::previous());
            } elseif (!\Yii::$app->request->isPost) {
                $model->load($_GET);
            }
        } catch (\Exception $e) {
            $msg = (isset($e->errorInfo[2]))?$e->errorInfo[2]:$e->getMessage();
            $model->addError('_exception', $msg);
        }
        return $this->render('create', ['model' => $model,]);
    }

    /**
     * Updates an existing Statistic model.
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
     * Deletes an existing Statistic model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(Url::previous());
    }

    public function beforeAction($action)
    {
        if (
            $action->id === 'adduser'
            || $action->id === 'addhit'
            || $action->id === 'addlead'
            //||$action->id === 'test'
        ) {
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }

//    public function actionTest(){
//        $path = Yii::$app->request->headers;
//        var_dump($path);exit;
//    }

    public function actionAdduser()
    {
        if(Yii::$app->request->isPost) {
            header('Access-Control-Allow-Origin: *');
            //read the post input (use this technique if you have no post variable name):
            $post = Yii::$app->request->rawBody;
            $data = Json::decode($post, true);
            $response = array();
            $user = \common\models\User::find()->where(['ref' => $data['ref']])->one();
            if ($user == null) {
                $response['errors'][] = 'Cant find a person with this personal refernce';
            }
            $offer = Offer::find()->where(['site' => $data['site']])->one();
            if ($offer == null) {
                $response['errors'][] = 'Cant find an offer with this site';
            }
            $date = new \DateTime();
            $statistic = Statistic::find()->where(['date' => $date->format('Y-m-d'), 'user_ref_id' => $user->id, 'offer_id' => $offer->id])->one();
            if ($user != null && $offer != null && $statistic == null) {
                $statistic = new Statistic();
                $statistic->date = $date->format('Y-m-d');
                $statistic->hits = 0;
                $statistic->leads = 0;
                $statistic->visitors = 0;
                $statistic->confirmed = 0;
                $statistic->question = 0;
                $statistic->warning = 0;
                $statistic->hold = 0;
                $statistic->profit = 0;
                $statistic->tb = 0;
                $statistic->user_ref_id = $user->id;
                $statistic->offer_id = $offer->id;
            }
            if ($statistic != null && $data['targeting'] === true) {
                $statistic->hits = $statistic->hits + 1;
                //TODO нужно ли всегда инкременить иситора?
                $statistic->visitors = $statistic->visitors + 1;
            } elseif ($statistic != null && $data['targeting'] === false) {
                $statistic->tb = $statistic->tb + 1;
                $statistic->hits = $statistic->hits + 1;
            }
            //save model, if that fails, get its validation errors:
            if ($statistic != null && $statistic->save() === false) {
                $response['success'] = false;
                $response['errors'] = $statistic->errors;
            } elseif ($statistic != null) {
                $response['success'] = true;
            }
            //respond with json content type:
            header('Content-type:application/json');
            echo JSON::encode($response);
        }
    }
    public function actionAddhit(){
        if(Yii::$app->request->isPost) {
            header('Access-Control-Allow-Origin: *');
            //read the post input (use this technique if you have no post variable name):
            $post = Yii::$app->request->rawBody;
            $data = Json::decode($post, true);
            $response = array();
            $user = \common\models\User::find()->where(['ref' => $data['ref']])->one();
            if ($user == null) {
                $response['errors'][] = 'Cant find a person with this personal refernce';
            }
            $offer = Offer::find()->where(['site' => $data['site']])->one();
            if ($offer == null) {
                $response['errors'][] = 'Cant find an offer with this site';
            }
            $date = new \DateTime();
            $statistic = Statistic::find()->where(['date' => $date->format('Y-m-d'), 'user_ref_id' => $user->id, 'offer_id' => $offer->id])->one();
            if ($user != null && $offer != null && $statistic == null)
                $response['errors'][] = 'Item with taken parameters does not exist.';
            if ($statistic != null && $data['targeting'] == true) {
                $statistic->hits = $statistic->hits + 1;
            } elseif ($statistic != null && $data['targeting'] == false) {
                $statistic->hits = $statistic->hits + 1;
            }
            //save model, if that fails, get its validation errors:
            if ($statistic != null && $statistic->save() === false) {
                $response['success'] = false;
                $response['errors'] = $statistic->errors;
            } else {
                if ($statistic != null) $response['success'] = true;
            }
            //respond with json content type:
            header('Content-type:application/json');
            echo JSON::encode($response);
        }
    }
    public function actionAddlead(){
        if(Yii::$app->request->isPost) {
            header('Access-Control-Allow-Origin: *');
            //read the post input (use this technique if you have no post variable name):
            $post = Yii::$app->request->rawBody;
            $data = Json::decode($post, true);
            $response = array();
            $user = \common\models\User::find()->where(['ref' => $data['ref']])->one();
            if ($user == null) {
                $response['errors'][] = 'Cant find a person with this personal refernce';
            }
            $offer = Offer::find()->where(['site' => $data['site']])->one();
            if ($offer == null) {
                $response['errors'][] = 'Cant find an offer with this site';
            }
            $date = new \DateTime();
            $statistic = Statistic::find()->where(['date' => $date->format('Y-m-d'), 'user_ref_id' => $user->id, 'offer_id' => $offer->id])->one();
            if ($user != null && $offer != null && $statistic == null) {
                $response['errors'][] = 'Item with taken parameters does not exist.';
            }
            if ($statistic != null && $data['targeting'] === true) {
                $statistic->leads = $statistic->leads + 1;
                $newdata = new StatisticData();
                $resultstring = "";
                foreach ($data['inputs'] as $key => $val) {
                    $resultstring = $resultstring . $key . "=>" . $val . "\n";
                }
                $newdata->data = $resultstring;
                $newdata->offer_id = $offer->id;
                $newdata->user_id = $user->id;
                $newdata->good_region = "Y";
                $newdata->save();
            } elseif ($data['targeting'] === false) {
                $newdata = new StatisticData();
                $loaded = array();
                $resultstring = "";
                foreach ($data['inputs'] as $key => $val) {
                    $resultstring = $resultstring . $key . "=>" . $val . "\n";
                }
                $newdata->data = $resultstring;
                $newdata->offer_id = $offer->id;
                $newdata->user_id = $user->id;
                $newdata->good_region = "N";
                $newdata->save();
            }
            //save model, if that fails, get its validation errors:
            if ($statistic != null && $statistic->save() === false) {
                $response['success'] = false;
                $response['errors'] = $statistic->errors;
            } else {
                if ($statistic != null) $response['success'] = true;
            }
            //respond with json content type:
            header('Content-type:application/json');
            echo JSON::encode($response);
        }
    }

    /**
     * Finds the Statistic model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Statistic the loaded model
     * @throws HttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Statistic::findOne($id)) !== null) {
            return $model;
        } else {
            throw new HttpException(404, 'The requested page does not exist.');
        }
    }
}
