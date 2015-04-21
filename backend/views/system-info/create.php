<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var common\models\SystemInfo $model
*/

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => 'System Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="system-info-create">

    <p class="pull-left">
        <?= Html::a('Cancel', \yii\helpers\Url::previous(), ['class' => 'btn btn-default']) ?>
    </p>
    <div class="clearfix"></div>

    <?php echo $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
