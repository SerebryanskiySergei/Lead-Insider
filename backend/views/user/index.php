<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
* @var common\models\UserSearch $searchModel
*/

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="user-index">

    <?php //     echo $this->render('_search', ['model' =>$searchModel]);
    ?>

    <div class="clearfix">
        <p class="pull-left">
            <?= Html::a('<span class="glyphicon glyphicon-plus"></span> New User', ['create'], ['class' => 'btn btn-success']) ?>
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
        'label' => '<i class="glyphicon glyphicon-arrow-right"> Payment</i>',
        'url' => [
            'payment/index',
        ],
    ],
    [
        'label' => '<i class="glyphicon glyphicon-arrow-right"> Statistic</i>',
        'url' => [
            'statistic/index',
        ],
    ],
    [
        'label' => '<i class="glyphicon glyphicon-arrow-right"> Ticket</i>',
        'url' => [
            'ticket/index',
        ],
    ],
    [
        'label' => '<i class="glyphicon glyphicon-arrow-right"> Ticket Comment</i>',
        'url' => [
            'ticket-comment/index',
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
//			'password_hash',
//			'auth_key',
//			'password_reset_token',
			'email:email',
//			'status',
//			'created_at',
			/*'updated_at'*/
			'name',
			'surname',
			'phone',
			'balance',
			'ref',
			'role',
			/*'email_confirm_token:email'*/
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
