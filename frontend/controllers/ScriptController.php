<?php

namespace frontend\controllers;

use common\models\Offer;
use common\models\Statistic;
use common\models\StatisticData;
use common\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Json;

class ScriptController extends \yii\web\Controller
{

    public function beforeAction($action)
    {
        if (
            $action->id === 'adduser'
            || $action->id === 'addhit'
            || $action->id === 'addlead'
        ) {
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }


    public function actionActscript($f = null)
    {
        \Yii::$app->response->headers->add('Content-Type', 'text/javascript; charset=utf-8');
        $filename ="";
        if($f==null){
            $filename="../web/statscripts/action.js";
        }
        else{
            $filename="../web/statscripts/".$f.".js";
        }
        return \Yii::$app->response->sendFile($filename,'script.js',['inline'=>true]);
    }


    public function actionStatscript($f = null)
    {
        \Yii::$app->response->headers->add('Content-Type', 'text/javascript; charset=utf-8');
        $filename ="";
        if($f==null){
            $filename="../web/statscripts/stat.js";
        }
        else{
            $filename="../web/statscripts/".$f.".js";
        }
        return \Yii::$app->response->sendFile($filename,'script.js',['inline'=>true]);
    }


    public function actionAdduser()
    {
        if(Yii::$app->request->isPost) {
            header('Access-Control-Allow-Origin: *');
            //read the post input (use this technique if you have no post variable name):
            $post = Yii::$app->request->rawBody;
            $data = Json::decode($post, true);
            $response = array();
            $user = User::find()->where(['ref' => $data['ref']])->one();
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
            $user = User::find()->where(['ref' => $data['ref']])->one();
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
            if($statistic != null)
                $statistic->hits++;
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
            $user = User::find()->where(['ref' => $data['ref']])->one();
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
                $newdata = new StatisticData();
                $resultstring = "";
                foreach ($data['inputs'] as $key => $val) {
                    $resultstring = $resultstring . $key . "=>" . $val . "\n";
                }
                $newdata->data = $resultstring;
                $newdata->stat_id = $statistic->id;
                $newdata->good_region = "Y";
                $newdata->save();
            }
            if ($statistic != null && $data['targeting'] === false) {
                $newdata = new StatisticData();
                $resultstring = "";
                foreach ($data['inputs'] as $key => $val) {
                    $resultstring = $resultstring . $key . "=>" . $val . "\n";
                }
                $newdata->data = $resultstring;
                $newdata->stat_id = $statistic->id;
                $newdata->good_region = "N";
                $newdata->save();
            }
            //save model, if that fails, get its validation errors:
            if ($statistic != null && $statistic->save() === false) {
                $response['success'] = false;
                $response['errors'] = $statistic->errors;
            } else {
                if ($statistic != null)
                    $response['success'] = true;
            }
            //respond with json content type:
            header('Content-type:application/json');
            echo JSON::encode($response);
        }
    }



}
