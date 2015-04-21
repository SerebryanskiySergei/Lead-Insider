<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $payment common\models\Payment */

$confirmLink = Yii::$app->urlManager->createAbsoluteUrl(['admin/ticket/view', 'id' => $payment->id]);
$userLink = Yii::$app->urlManager->createAbsoluteUrl(['admin/user/view', 'id' => $payment->user_id]);

?>
<h1>Здравствуйте!</h1>
<p>Уведомляем вас что на сайте Lead.Insider был создан тикет.<br>
    <br>
    Пользователь <?= Html::a(Html::encode($userLink), $userLink) ?>.<br>
    Просмотреть тикет можно можно по ссылке :<br>
    <?= Html::a(Html::encode($confirmLink), $confirmLink) ?><br></p>