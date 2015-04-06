<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
$bundle = \yii\web\AssetBundle::register($this);
?>

<div class="admin-form theme-info mw700" style="margin-top: 3%;" id="login1">

    <div class="row mb15 table-layout">

        <div class="col-xs-6 va-m pln">
            <a href="dashboard.html" title="Return to Dashboard">
<!--                <img src="../../web/img/logos/logo_white.png" title="AdminDesigns Logo" class="img-responsive w250">-->
                <img src="<?=$bundle->baseUrl.'/img/logos/logo_white.png'?>" title="AdminDesigns Logo" class="img-responsive w250">
            </a>
        </div>

        <div class="col-xs-6 text-right va-b pr5">
            <div class="login-links">
                <a href="<?=\yii\helpers\Url::toRoute('site/login');?>" class="" title="Sign In">Вход</a>
                <span class="text-white"> | </span>
                <a href="<?=\yii\helpers\Url::toRoute('site/signup');?>" class="active" title="Register">Регистрация</a>
            </div>

        </div>

    </div>

    <div class="panel panel-info mt10 br-n">


        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
        <div class="panel-body p25 bg-light">
            <div class="section-divider mt10 mb40">
                <span>Заполните поля</span>
            </div>
            <!-- .section-divider -->
            <?= $form->field($model, 'email',['template'=>'<label for="email" class="field prepend-icon">{input}{label}{hint}{error}','labelOptions'=>['class'=>'field-icon']])->textInput(['placeholder'=>'Введите email','class'=>'gui-input','id'=>'email','type'=>'email'])->label('<i class="fa fa-envelope"></i>') ?>
            <!--                            <div class="section">-->
            <!--                                <label for="email" class="field prepend-icon">-->
            <!--                                    <input type="email" name="SignupForm[email]" id="email" class="gui-input" placeholder="Введите email">-->
            <!--//                                    <label for="email" class="field-icon"><i class="fa fa-envelope"></i>-->
            <!--//                                    </label>-->
            <!--                                </label>-->
            <!--                            </div>-->
            <!-- end section -->

            <?= $form->field($model, 'password',['template'=>'<label for="password" class="field prepend-icon">{input}{label}{hint}{error}','labelOptions'=>['class'=>'field-icon']])->passwordInput(['placeholder'=>'Создайте пароль','class'=>'gui-input','id'=>'password','type'=>'password'])->label('<i class="fa fa-lock"></i>') ?>

            <!--                            <div class="section">-->
            <!--                                <label for="password" class="field prepend-icon">-->
            <!--                                    <input type="text" name="SignupForm[password]" id="password" class="gui-input" placeholder="Создайте пароль">-->
            <!--                                    <label for="password" class="field-icon"><i class="fa fa-lock"></i>-->
            <!--                                    </label>-->
            <!--                                </label>-->
            <!--                            </div>-->
            <!-- end section -->

            <div class="section mb15">
                <label class="option block mt15">
                    <input type="checkbox" name="terms" required>
                    <span class="checkbox"></span>Я соглашаюсь с
                    <a href="#" class="smart-link"> правилами. </a>
                </label>
            </div>
            <!-- end section -->

        </div>
        <!-- end .form-body section -->
        <div class="panel-footer clearfix">
            <?= Html::submitButton('Создать аккаунт', ['class' => 'button btn-primary pull-right', 'name' => 'signup-button']) ?>
        </div>
        <!-- end .form-footer section -->
        <?php ActiveForm::end(); ?>
    </div>
</div>


