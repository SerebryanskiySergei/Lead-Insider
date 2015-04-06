<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/**
* @var yii\web\View $this
* @var common\models\Offer $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="offer-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal', 'enableClientValidation' => false]); ?>

    <div class="">
        <?php echo $form->errorSummary($model); ?>
        <?php $this->beginBlock('main'); ?>

        <p>
            
			<?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>
			<?= $form->field($model, 'action_id')->textInput() ?>
			<?= $form->field($model, 'price')->textInput() ?>
			<?= $form->field($model, 'region')->textInput(['maxlength' => 255]) ?>
			<?= $form->field($model, 'lead')->textInput(['maxlength' => 255]) ?>
			<?= $form->field($model, 'hold')->textInput() ?>
			<?= $form->field($model, 'access_type_id')->textInput() ?>
			<?= $form->field($model, 'epc')->textInput(['maxlength' => 255]) ?>
			<?= $form->field($model, 'postclick')->textInput() ?>
			<?= $form->field($model, 'site')->textInput(['maxlength' => 255]) ?>
			<?= $form->field($model, 'caption')->textarea(['rows' => 6]) ?>
			<?= $form->field($model, 'traff_1')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>
			<?= $form->field($model, 'traff_2')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>
			<?= $form->field($model, 'traff_3')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>
			<?= $form->field($model, 'traff_4')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>
			<?= $form->field($model, 'traff_5')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>
			<?= $form->field($model, 'traff_6')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>
			<?= $form->field($model, 'traff_7')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>
			<?= $form->field($model, 'traff_8')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>
			<?= $form->field($model, 'traff_9')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>
			<?= $form->field($model, 'traff_10')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>
			<?= $form->field($model, 'fraff_11')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>
			<?= $form->field($model, 'create_time')->textInput() ?>
        </p>
        <?php $this->endBlock(); ?>
        
        <?=
    \yii\bootstrap\Tabs::widget(
                 [
                   'encodeLabels' => false,
                     'items' => [ [
    'label'   => 'Offer',
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
