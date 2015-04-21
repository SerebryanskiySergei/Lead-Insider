<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/**
* @var yii\web\View $this
* @var common\models\StatisticData $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="statistic-data-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal', 'enableClientValidation' => false]); ?>

    <div class="">
        <?php echo $form->errorSummary($model); ?>
        <?php $this->beginBlock('main'); ?>

        <p>
            
			<?= // generated by schmunk42\giiant\crud\providers\RelationProvider::activeField
$form->field($model, 'stat_id')->dropDownList(
    \yii\helpers\ArrayHelper::map(common\models\Statistic::find()->all(),'id','id'),
    ['prompt'=>'Choose...']
); ?>
			<?= $form->field($model, 'data')->textarea(['rows' => 6]) ?>
			<?= $form->field($model, 'good_region')->radioList([ 'Y' => 'Целевой', 'N' => 'Нецелевой', ]) ?>
			<?= $form->field($model, 'status')->radioList([ 'confirmed' => 'Confirmed', 'banned' => 'Banned', 'waiting' => 'Waiting', ]) ?>
        </p>
        <?php $this->endBlock(); ?>
        
        <?=
    \yii\bootstrap\Tabs::widget(
                 [
                   'encodeLabels' => false,
                     'items' => [ [
    'label'   => 'StatisticData',
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
