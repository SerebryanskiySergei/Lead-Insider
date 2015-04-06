<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
* @var common\OfferSearch $searchModel
*/

$this->title = 'Offers';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="offer-index">

    <?php //     echo $this->render('_search', ['model' =>$searchModel]);
    ?>

    <div class="clearfix">
        <p class="pull-left">
            <?= Html::a('<span class="glyphicon glyphicon-plus"></span> New Offer', ['create'], ['class' => 'btn btn-success']) ?>
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
        'label' => '<i class="glyphicon glyphicon-arrow-left"> Access Type</i>',
        'url' => [
            'access-type/index',
        ],
    ],
    [
        'label' => '<i class="glyphicon glyphicon-arrow-left"> Offer Action</i>',
        'url' => [
            'offer-action/index',
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
        
			'id',
			'title',
			// generated by schmunk42\giiant\crud\providers\RelationProvider::columnFormat
[
            "class" => yii\grid\DataColumn::className(),
            "attribute" => "action_id",
            "value" => function($model){
                if ($rel = $model->getAction()->one()) {
                    return yii\helpers\Html::a($rel->title,["offer-action/view", 'id' => $rel->id,],["data-pjax"=>0]);
                } else {
                    return '';
                }
            },
            "format" => "raw",
],
			'price',
			'region',
			'lead',
			'hold',
			/*// generated by schmunk42\giiant\crud\providers\RelationProvider::columnFormat
[
            "class" => yii\grid\DataColumn::className(),
            "attribute" => "access_type_id",
            "value" => function($model){
                if ($rel = $model->getAccessType()->one()) {
                    return yii\helpers\Html::a($rel->title,["access-type/view", 'id' => $rel->id,],["data-pjax"=>0]);
                } else {
                    return '';
                }
            },
            "format" => "raw",
]*/
			/*'cpe'*/
			/*'postclick'*/
			/*'site'*/
			/*'caption:ntext'*/
			/*'traff_1'*/
			/*'traff_2'*/
			/*'traff_3'*/
			/*'traff_4'*/
			/*'traff_5'*/
			/*'traff_6'*/
			/*'traff_7'*/
			/*'traff_8'*/
			/*'traff_9'*/
			/*'traff_10'*/
			/*'fraff_11'*/
			/*'create_time'*/
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