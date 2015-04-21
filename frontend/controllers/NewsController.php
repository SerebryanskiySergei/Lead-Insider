<?php

namespace frontend\controllers;

use common\models\News;

class NewsController extends \yii\web\Controller
{
    public $layout= "with_menu";
    public function actionIndex()
    {
        $news = News::find()->orderBy(['id'=>SORT_DESC])->all();
        $dates = News::find()->distinct(true)->select('create_date')->orderBy(['id'=>SORT_DESC])->asArray()->all();
        return $this->render('index',['news'=>$news,'dates'=>$dates]);
    }

}
