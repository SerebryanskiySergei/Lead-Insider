<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/**
* @var yii\web\View $this
* @var common\models\Offer $model
*/

$this->title = 'Offer View ' . $model->title . '';
$this->params['breadcrumbs'][] = ['label' => 'Offers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="offer-view">

    <p class='pull-left'>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> Edit', ['update', 'id' => $model->id],
        ['class' => 'btn btn-info']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> New Offer', ['create'], ['class' => 'btn
        btn-success']) ?>
    </p>

        <p class='pull-right'>
        <?= Html::a('<span class="glyphicon glyphicon-list"></span> List', ['index'], ['class'=>'btn btn-default']) ?>
    </p><div class='clearfix'></div> 

    
    <h3>
        <?= $model->title ?>    </h3>


    <?php $this->beginBlock('common\models\Offer'); ?>

    <?php echo DetailView::widget([
    'model' => $model,
    'attributes' => [
    			'id',
			'title',
// generated by schmunk42\giiant\crud\providers\RelationProvider::attributeFormat
[
    'format'=>'html',
    'attribute'=>'action_id',
    'value' => ($model->getAction()->one() ? Html::a($model->getAction()->one()->title, ['offer-action/view', 'id' => $model->getAction()->one()->id,]) : '<span class="label label-warning">?</span>'),
],
			'price',
			'our_percent',
			'status',
// generated by schmunk42\giiant\crud\providers\RelationProvider::attributeFormat
[
    'format'=>'html',
    'attribute'=>'region_id',
    'value' => ($model->getRegion()->one() ? Html::a($model->getRegion()->one()->title, ['region/view', 'id' => $model->getRegion()->one()->id,]) : '<span class="label label-warning">?</span>'),
],
			'lead',
			'hold',
// generated by schmunk42\giiant\crud\providers\RelationProvider::attributeFormat
[
    'format'=>'html',
    'attribute'=>'access_type_id',
    'value' => ($model->getAccessType()->one() ? Html::a($model->getAccessType()->one()->title, ['access-type/view', 'id' => $model->getAccessType()->one()->id,]) : '<span class="label label-warning">?</span>'),
],
			'cpe',
			'postclick',
			'site',
			'caption:ntext',
			'traff_1',
			'traff_2',
			'traff_3',
			'traff_4',
			'traff_5',
			'traff_6',
			'traff_7',
			'traff_8',
			'traff_9',
			'traff_10',
			'traff_11',
			'create_time',
    ],
    ]); ?>

    <hr/>

    <?php echo Html::a('<span class="glyphicon glyphicon-trash"></span> Delete', ['delete', 'id' => $model->id],
    [
    'class' => 'btn btn-danger',
    'data-confirm' => Yii::t('app', 'Are you sure to delete this item?'),
    'data-method' => 'post',
    ]); ?>

    <?php $this->endBlock(); ?>


    
<?php $this->beginBlock('Statistics'); ?>
<p class='pull-right'>
  <?= \yii\helpers\Html::a(
            '<span class="glyphicon glyphicon-list"></span> List All Statistics',
            ['statistic/index'],
            ['class'=>'btn text-muted btn-xs']
        ) ?>
  <?= \yii\helpers\Html::a(
            '<span class="glyphicon glyphicon-plus"></span> New Statistic',
            ['statistic/create', 'Statistic'=>['offer_id'=>$model->id]],
            ['class'=>'btn btn-success btn-xs']
        ) ?>
</p><div class='clearfix'></div>
<?php Pjax::begin(['id'=>'pjax-Statistics','linkSelector'=>'#pjax-Statistics ul.pagination a']) ?>
<?= \yii\grid\GridView::widget([
    'dataProvider' => new \yii\data\ActiveDataProvider(['query' => $model->getStatistics(), 'pagination' => ['pageSize' => 10]]),
    'columns' => [			'id',
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
[
    'class'      => 'yii\grid\ActionColumn',
    'template'   => '{view} {update}',
    'contentOptions' => ['nowrap'=>'nowrap'],
    'urlCreator' => function($action, $model, $key, $index) {
        // using the column name as key, not mapping to 'id' like the standard generator
        $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
        $params[0] = 'statistic' . '/' . $action;
        return \yii\helpers\Url::toRoute($params);
    },
    'buttons'    => [
        
    ],
    'controller' => 'statistic'
],]
]);?>
<?php Pjax::end() ?>
<?php $this->endBlock() ?>


    <?=
    \yii\bootstrap\Tabs::widget(
                 [
                     'id' => 'relation-tabs',
                     'encodeLabels' => false,
                     'items' => [ [
    'label'   => '<span class="glyphicon glyphicon-asterisk"></span> Offer',
    'content' => $this->blocks['common\models\Offer'],
    'active'  => true,
],[
    'label'   => '<small><span class="glyphicon glyphicon-paperclip"></span> Statistics</small>',
    'content' => $this->blocks['Statistics'],
    'active'  => false,
], ]
                 ]
    );
    ?></div>
