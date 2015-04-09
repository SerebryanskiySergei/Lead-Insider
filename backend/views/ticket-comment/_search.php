<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\TicketCommentSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="ticket-comment-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'ticket_id') ?>

		<?= $form->field($model, 'author_id') ?>

		<?= $form->field($model, 'text') ?>

		<?= $form->field($model, 'create_date') ?>

		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
