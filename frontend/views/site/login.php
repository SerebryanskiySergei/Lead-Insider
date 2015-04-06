<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Войти';
$this->params['breadcrumbs'][] = $this->title;
$bundle = \yii\web\AssetBundle::register($this);
?>

<div class="admin-form theme-info" id="login1">

    <div class="row mb15 table-layout">

        <div class="col-xs-6 va-m pln">
            <a href="dashboard.html" title="Return to Dashboard">
                <img src="<?=$bundle->baseUrl.'/img/logos/logo_white.png'?>" title="AdminDesigns Logo" class="img-responsive w250">
            </a>
        </div>

        <div class="col-xs-6 text-right va-b pr5">
            <div class="login-links">
                <a href="<?=\yii\helpers\Url::toRoute('site/login')?>" class="active" title="Sign In">Вход</a>
                <span class="text-white"> | </span>
                <a href="<?=\yii\helpers\Url::toRoute('site/signup')?>" class="" title="Register">Регистрация</a>
            </div>

        </div>

    </div>

    <div class="panel panel-info mt10 br-n">
        <?php $form = ActiveForm::begin(['id' => 'form-login']); ?>
        <!-- end .form-header section -->
        <div class="panel-body bg-light p30">
            <div class="row">
                <div class="col-sm-7 pr30">
                    <?= $form->field($model, 'email',['template'=>'<label for="email" class="field-label text-muted fs18 mb10">Email</label><label for="email" class="field prepend-icon">{input}{label}{hint}{error}','labelOptions'=>['class'=>'field-icon']])->textInput(['placeholder'=>'Введите email','class'=>'gui-input','id'=>'email','type'=>'email'])->label('<i class="fa fa fa-user"></i>') ?>

                    <!--                                    <div class="section">-->
                    <!--                                        <label for="username" class="field-label text-muted fs18 mb10">Логин</label>-->
                    <!--                                        <label for="username" class="field prepend-icon">-->
                    <!--                                            <input type="text" name="LoginForm[username]" id="username" class="gui-input" placeholder="Введите логин">-->
                    <!--                                            <label for="username" class="field-icon"><i class="fa fa-user"></i>-->
                    <!--                                            </label>-->
                    <!--                                        </label>-->
                    <!--                                    </div>-->
                    <!-- end section -->
                    <?= $form->field($model, 'password',['template'=>'<label for="password" class="field-label text-muted fs18 mb10">Пароль</label><label for="username" class="field prepend-icon">{input}{label}{hint}{error}','labelOptions'=>['class'=>'field-icon']])->passwordInput(['placeholder'=>'Введите пароль','class'=>'gui-input','id'=>'password'])->label('<i class="fa fa fa-lock"></i>') ?>

                    <!--                                    <div class="section">-->
                    <!--                                        <label for="username" class="field-label text-muted fs18 mb10">Пароль</label>-->
                    <!--                                        <label for="password" class="field prepend-icon">-->
                    <!--                                            <input type="text" name="LoginForm[password]" id="password" class="gui-input" placeholder="Введите пароль">-->
                    <!--                                            <label for="password" class="field-icon"><i class="fa fa-lock"></i>-->
                    <!--                                            </label>-->
                    <!--                                        </label>-->
                    <!--                                    </div>-->
                    <!-- end section -->

                </div>
                <div class="col-sm-5 br-l br-grey pl30">
                    <h3 class="mb25"> Чтобы получить доступ:</h3>
                    <p class="mb15">
                        <span class="fa fa-check text-success pr5"></span> нужно оставить заявку</p>
                    <p class="mb15">
                        <span class="fa fa-check text-success pr5"></span> быть честным вебмастером</p>
                    <p class="mb15">
                        <span class="fa fa-check text-success pr5"></span> и иметь добрые намерения</p>
                </div>
            </div>
        </div>
        <!-- end .form-body section -->
        <div class="panel-footer clearfix p10 ph15">
            <?= Html::submitButton('Войти', ['class' => 'button btn-primary mr10 pull-right', 'name' => 'signup-button']) ?>
            <label class="switch block switch-primary pull-left input-align mt10">
                <input type="checkbox" name="rememberMe" id="rememberMe" checked>
                <label for="rememberMe" data-on="YES" data-off="NO"></label>
                <span>Запомнить</span>
            </label>
        </div>
        <!-- end .form-footer section -->
        <?php ActiveForm::end(); ?>

    </div>
</div>