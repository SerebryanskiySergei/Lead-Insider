<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var backend\models\StatisticDataSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="statistic-data-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'user_id') ?>

		<?= $form->field($model, 'offer_id') ?>

		<?= $form->field($model, 'data') ?>

		<?= $form->field($model, 'good_region') ?>

		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
