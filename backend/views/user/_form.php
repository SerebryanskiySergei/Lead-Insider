<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/**
* @var yii\web\View $this
* @var common\models\User $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal', 'enableClientValidation' => false]); ?>

    <div class="">
        <?php echo $form->errorSummary($model); ?>
        <?php $this->beginBlock('main'); ?>

        <p>
            
			<?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>
			<?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>
			<?= $form->field($model, 'surname')->textInput(['maxlength' => 255]) ?>
			<?= $form->field($model, 'phone')->textInput(['maxlength' => 255]) ?>
			<?= $form->field($model, 'status')->radioList([\common\models\User::STATUS_WAITING_VALIDATION=>'Ожидает подтверждения почты',\common\models\User::STATUS_DELETED=>'Заблокирован',\common\models\User::STATUS_ACTIVE=>'Активен']) ?>
			<?= $form->field($model, 'role')->radioList([\common\models\User::ROLE_ADMIN=>'Админ',\common\models\User::ROLE_ADVERTISER=>'Рекламодатель',\common\models\User::ROLE_WEBMASTER=>'Вебмастер']) ?>
        </p>
        <?php $this->endBlock(); ?>
        
        <?=
    \yii\bootstrap\Tabs::widget(
                 [
                   'encodeLabels' => false,
                     'items' => [ [
    'label'   => 'User',
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
