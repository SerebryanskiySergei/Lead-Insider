<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/**
* @var yii\web\View $this
* @var common\models\Payment $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="payment-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal', 'enableClientValidation' => false]); ?>

    <div class="">
        <?php echo $form->errorSummary($model); ?>
        <?php $this->beginBlock('main'); ?>

        <p>
            
			<?= // generated by schmunk42\giiant\crud\providers\RelationProvider::activeField
$form->field($model, 'user_id')->dropDownList(
    \yii\helpers\ArrayHelper::map(common\models\User::find()->all(),'id','name'),
    ['prompt'=>'Choose...']
); ?>
			<?= $form->field($model, 'wmid')->textInput(['maxlength' => 255]) ?>
			<?= $form->field($model, 'count')->textInput(['maxlength' => 255]) ?>
			<?= $form->field($model, 'status')->dropDownList([ 'Активно' => 'Активно', 'Отклонено' => 'Отклонено', 'Недостаточно средств' => 'Недостаточно средств', 'Выполнено' => 'Выполнено', ], ['prompt' => '']) ?>
        </p>
        <?php $this->endBlock(); ?>
        
        <?=
    \yii\bootstrap\Tabs::widget(
                 [
                   'encodeLabels' => false,
                     'items' => [ [
    'label'   => 'Payment',
    'content' => $this->blocks['main'],
    'active'  => true,
], ]
                 ]
    );
    ?>
        <hr/>

        <?= Html::submitButton('<span class="glyphicon glyphicon-check"></span> '.($model->isNewRecord ? 'Create' : 'Save'), ['class' => $model->isNewRecord ?
        'btn btn-primary' : 'btn btn-primary']) ?>

        <?php ActiveForm::end(); ?>

    </div>

</div>
