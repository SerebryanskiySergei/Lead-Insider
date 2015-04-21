<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $ticketComment common\models\TicketComment*/

$confirmLink = Yii::$app->urlManager->createAbsoluteUrl(['admin/ticket/view', 'id' => $ticketComment->ticket_id]);
$userLink = Yii::$app->urlManager->createAbsoluteUrl(['admin/user/view', 'id' => $ticketComment->author_id]);

?>
<h1>Здравствуйте!</h1>
<p>Уведомляем вас что пользователь <?=Html::encode($userLink)?> оставил комментарийк тикету.<br>
    <br>
    Пользователь <?= Html::a(Html::encode($userLink), $userLink) ?>.<br>
    Просмотреть тикет можно можно по ссылке :<br>
    <?= Html::a(Html::encode($confirmLink), $confirmLink) ?><br>
</p>