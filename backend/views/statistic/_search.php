<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\StatisticSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="statistic-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'offer_id') ?>

		<?= $form->field($model, 'user_ref_id') ?>

		<?= $form->field($model, 'date') ?>

		<?= $form->field($model, 'hits') ?>

		<?php // echo $form->field($model, 'visitors') ?>

		<?php // echo $form->field($model, 'tb') ?>

		<?php // echo $form->field($model, 'leads') ?>

		<?php // echo $form->field($model, 'confirmed') ?>

		<?php // echo $form->field($model, 'question') ?>

		<?php // echo $form->field($model, 'warning') ?>

		<?php // echo $form->field($model, 'hold') ?>

		<?php // echo $form->field($model, 'profit') ?>

		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
