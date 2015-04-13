<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\UserSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="user-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'username') ?>

		<?= $form->field($model, 'password_hash') ?>

		<?= $form->field($model, 'auth_key') ?>

		<?= $form->field($model, 'password_reset_token') ?>

		<?php // echo $form->field($model, 'email') ?>

		<?php // echo $form->field($model, 'status') ?>

		<?php // echo $form->field($model, 'created_at') ?>

		<?php // echo $form->field($model, 'updated_at') ?>

		<?php // echo $form->field($model, 'name') ?>

		<?php // echo $form->field($model, 'surname') ?>

		<?php // echo $form->field($model, 'phone') ?>

		<?php // echo $form->field($model, 'balance') ?>

		<?php // echo $form->field($model, 'ref') ?>

		<?php // echo $form->field($model, 'role') ?>

		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
