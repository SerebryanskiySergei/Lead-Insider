<?php

namespace frontend\controllers;

use common\models\News;

class NewsController extends \yii\web\Controller
{
    public $layout= "with_menu";
    public function actionIndex()
    {
        if(\Yii::$app->user->can('advertboard')) {
            $news = News::find()->where(['visibility' => [News::VISIBILITY_ADVERTISER, News::VISIBILITY_ALL]])->orderBy(['id' => SORT_DESC])->all();
            $dates = News::find()->distinct(true)->where(['visibility'=>[News::VISIBILITY_ADVERTISER,News::VISIBILITY_ALL]])->select('create_date')->orderBy(['id'=>SORT_DESC])->asArray()->all();
        }
        else {
            $news = News::find()->where(['visibility' => [News::VISIBILITY_WEBMASTER, News::VISIBILITY_ALL]])->orderBy(['id' => SORT_DESC])->all();
            $dates = News::find()->distinct(true)->where(['visibility'=>[News::VISIBILITY_WEBMASTER, News::VISIBILITY_ALL]])->select('create_date')->orderBy(['id'=>SORT_DESC])->asArray()->all();

        }
        return $this->render('index',['news'=>$news,'dates'=>$dates]);
    }

}
