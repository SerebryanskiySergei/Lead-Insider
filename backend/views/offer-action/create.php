<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var common\models\OfferAction $model
*/

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => 'Offer Actions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="offer-action-create">

    <p class="pull-left">
        <?= Html::a('Cancel', \yii\helpers\Url::previous(), ['class' => 'btn btn-default']) ?>
    </p>
    <div class="clearfix"></div>

    <?php echo $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
