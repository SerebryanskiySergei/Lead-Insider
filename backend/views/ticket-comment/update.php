<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\TicketComment $model
 */

$this->title = 'Ticket Comment Update ' . $model->id . '';
$this->params['breadcrumbs'][] = ['label' => 'Ticket Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="ticket-comment-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> View', ['view', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
    </p>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
