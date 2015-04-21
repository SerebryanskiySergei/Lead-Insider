<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
* @var common\models\StatisticSearch $searchModel
*/

$this->title = 'Statistics';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="statistic-index">

    <?php //     echo $this->render('_search', ['model' =>$searchModel]);
    ?>

    <div class="clearfix">
        <p class="pull-left">
            <?= Html::a('<span class="glyphicon glyphicon-plus"></span> New Statistic', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <div class="pull-right">


                                                                                                            
            <?php 
            echo \yii\bootstrap\ButtonDropdown::widget(
                [
                    'id'       => 'giiant-relations',
                    'encodeLabel' => false,
                    'label'    => '<span class="glyphicon glyphicon-paperclip"></span> Relations',
                    'dropdown' => [
                        'options'      => [
                            'class' => 'dropdown-menu-right'
                        ],
                        'encodeLabels' => false,
                        'items'        => [
    [
        'label' => '<i class="glyphicon glyphicon-arrow-left"> Offer</i>',
        'url' => [
            'offer/index',
        ],
    ],
    [
        'label' => '<i class="glyphicon glyphicon-arrow-left"> User</i>',
        'url' => [
            'user/index',
        ],
    ],
    [
        'label' => '<i class="glyphicon glyphicon-arrow-right"> Statistic Data</i>',
        'url' => [
            'statistic-data/index',
        ],
    ],
]                    ],
                ]
            );
            ?>        </div>
    </div>

            <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
        
//			'id',
			// generated by schmunk42\giiant\crud\providers\RelationProvider::columnFormat
[
            "class" => yii\grid\DataColumn::className(),
            "attribute" => "offer_id",
            "value" => function($model){
                if ($rel = $model->getOffer()->one()) {
                    return yii\helpers\Html::a($rel->title,["offer/view", 'id' => $rel->id,],["data-pjax"=>0]);
                } else {
                    return '';
                }
            },
            "format" => "raw",
],
			// generated by schmunk42\giiant\crud\providers\RelationProvider::columnFormat
[
            "class" => yii\grid\DataColumn::className(),
            "attribute" => "user_ref_id",
            "value" => function($model){
                if ($rel = $model->getUserRef()->one()) {
                    return yii\helpers\Html::a($rel->name,["user/view", 'id' => $rel->id,],["data-pjax"=>0]);
                } else {
                    return '';
                }
            },
            "format" => "raw",
],
			'date',
			'hits',
			'visitors',
			'tb',
			'leads',
			'confirmed',
			'question',
			'warning',
			'hold',
			'profit',
            [
                'class' => 'yii\grid\ActionColumn',
                'urlCreator' => function($action, $model, $key, $index) {
                    // using the column name as key, not mapping to 'id' like the standard generator
                    $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
                    $params[0] = \Yii::$app->controller->id ? \Yii::$app->controller->id . '/' . $action : $action;
                    return \yii\helpers\Url::toRoute($params);
                },
                'contentOptions' => ['nowrap'=>'nowrap']
            ],
        ],
    ]); ?>
    
</div>
