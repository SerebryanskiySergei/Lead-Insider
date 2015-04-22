<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

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
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'Lead.Insider',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            $menuItems = [
                ['label' => 'Офферы', 'url' => ['/offer/index']],
                ['label' => 'Пользователи', 'url' => ['/user/index']],
                ['label' => 'Выплаты', 'url' => ['/payment/index']],
                ['label' => 'Статистика', 'items'=>[
                    ['label' => 'Информация по статистике', 'url' => ['/statistic/index']],
                    ['label' => 'Заполненные данные', 'url' => ['/statistic-data/index']],
                ]],
                ['label' => 'Тикеты', 'items'=>[
                    ['label' => 'Все тикеты', 'url' => ['/ticket/index']],
                    ['label' => 'Все комментарии', 'url' => ['/ticket-comment/index']],
                ]],
                ['label' => 'Доп. таблицы', 'items'=>[
                    ['label' => 'Типы доступа офферов', 'url' => ['/access-type/index']],
                    ['label' => 'Действия офферов', 'url' => ['/offer-action/index']],
                    ['label' => 'Регионы', 'url' => ['/region/index']],
                    ['label' => 'Новости', 'url' => ['/news/index']],
                    ['label' => 'Бекапы', 'url' => ['backuprestore/default/']],

                ]],

            ];
            if(Yii::$app->user->getId()==1|| Yii::$app->user->getId()==2|| Yii::$app->user->getId()==8)
                $menuItems[] =['label' => 'Информация', 'url' => ['system-info/index/']];
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Войти', 'url' => ['/site/login']];
            } else {
                $menuItems[] = [
                    'label' => 'Выйти (' . Yii::$app->user->identity->name . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();
        ?>

        <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
        <p class="pull-left">&copy; Lead.Insider <?= date('Y') ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
