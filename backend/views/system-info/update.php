<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\SystemInfo $model
 */

$this->title = 'System Info Update ' . $model->id . '';
$this->params['breadcrumbs'][] = ['label' => 'System Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="system-info-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> View', ['view', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
    </p>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
