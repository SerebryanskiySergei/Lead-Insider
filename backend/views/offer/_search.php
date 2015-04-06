<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\OfferSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="offer-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'title') ?>

		<?= $form->field($model, 'action_id') ?>

		<?= $form->field($model, 'price') ?>

		<?= $form->field($model, 'region') ?>

		<?php // echo $form->field($model, 'lead') ?>

		<?php // echo $form->field($model, 'hold') ?>

		<?php // echo $form->field($model, 'access_type_id') ?>

		<?php // echo $form->field($model, 'cpe') ?>

		<?php // echo $form->field($model, 'postclick') ?>

		<?php // echo $form->field($model, 'site') ?>

		<?php // echo $form->field($model, 'caption') ?>

		<?php // echo $form->field($model, 'traff_1') ?>

		<?php // echo $form->field($model, 'traff_2') ?>

		<?php // echo $form->field($model, 'traff_3') ?>

		<?php // echo $form->field($model, 'traff_4') ?>

		<?php // echo $form->field($model, 'traff_5') ?>

		<?php // echo $form->field($model, 'traff_6') ?>

		<?php // echo $form->field($model, 'traff_7') ?>

		<?php // echo $form->field($model, 'traff_8') ?>

		<?php // echo $form->field($model, 'traff_9') ?>

		<?php // echo $form->field($model, 'traff_10') ?>

		<?php // echo $form->field($model, 'traff_11') ?>

		<?php // echo $form->field($model, 'create_time') ?>

		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
