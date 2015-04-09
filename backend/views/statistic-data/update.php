<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\StatisticData $model
 */

$this->title = 'Statistic Data Update ' . $model->id . '';
$this->params['breadcrumbs'][] = ['label' => 'Statistic Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="statistic-data-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> View', ['view', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
    </p>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>