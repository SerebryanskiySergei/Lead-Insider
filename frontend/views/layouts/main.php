<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title>Lead.Insider - CPA сеть от людей и для людей</title>
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800'>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300">
    <?php $this->head() ?>
    <!-- Favicon -->
    <link rel="shortcut icon" href="../../web/img/favicon.jpg">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="external-page sb-l-c sb-r-c">
<?php $this->beginBody() ?>
<!-- Start: Settings Scripts -->
<script>
    var boxtest = localStorage.getItem('boxed');

    if (boxtest === 'true') {
        document.body.className += ' boxed-layout';
    }
</script>
<!-- End: Settings Scripts -->
<!-- End: Settings Scripts -->

<!-- Start: Main -->
<div id="main" class="animated fadeIn">

    <!-- Start: Content -->
    <section id="content_wrapper">

        <!-- begin canvas animation bg -->
        <div id="canvas-wrapper">
            <canvas id="demo-canvas"></canvas>
        </div>

        <!-- Begin: Content -->
        <section id="content">
<?php
//NavBar::begin([
//    'brandLabel' => 'Lead.Insider',
//    'brandUrl' => Yii::$app->homeUrl,
//    'options' => [
//        'class' => 'navbar-inverse navbar-static-top',
//    ],
//]);
//$menuItems = [
//    ['label' => 'Главная', 'url' => ['/site/index']],
//    ['label' => 'Офферы', 'url' => ['/offer/index']],
//
//    ['label' => 'О нас', 'url' => ['/site/about']],
//    ['label' => 'Контакты', 'url' => ['/site/contact']],
//];
//if (Yii::$app->user->isGuest) {
//    $menuItems[] = ['label' => 'Зарегестрироваться', 'url' => ['/site/signup']];
//    $menuItems[] = ['label' => 'Войти', 'url' => ['/site/login']];
//} else {
//    $menuItems[] = [
//        'label' => 'Выйти (' . Yii::$app->user->identity->username . ')',
//        'url' => ['/site/logout'],
//        'linkOptions' => ['data-method' => 'post']
//    ];
//    $menuItems[] = [
//        'label' => 'Админу',
//        'items'=>[
//            ['label' => 'Пользователи', 'url' => ['/user/index']],
//            ['label' => 'Типы доступа', 'url' => ['/access-type/index']],
//            ['label' => 'Типы действий оффера', 'url' => ['/offer-action/index']],
//        ]
//    ];
//}
//echo Nav::widget([
//    'options' => ['class' => 'navbar-nav navbar-right'],
//    'items' => $menuItems,
//]);
//NavBar::end();
?>


<?= $content ?>

        </section>
        <!-- End: Content-Wrapper -->

</div>

<?php $this->endBody() ?>
<!-- BEGIN: PAGE SCRIPTS -->

<!-- Google Map API -->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>

<script type="text/javascript">
    jQuery(document).ready(function() {

        "use strict";

        // Init Theme Core
        Core.init();

        // Init Demo JS
        //Demo.init();

        // Init CanvasBG and pass target starting location
        CanvasBG.init({
            Loc: {
                x: window.innerWidth / 2,
                y: window.innerHeight / 3.3
            }
        });
    });
</script>

</body>
</html>
<?php $this->endPage() ?>
