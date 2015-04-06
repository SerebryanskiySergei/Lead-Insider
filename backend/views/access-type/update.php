<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\AccessType $model
 */

$this->title = 'Access Type Update ' . $model->title . '';
$this->params['breadcrumbs'][] = ['label' => 'Access Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="access-type-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> View', ['view', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
    </p>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
