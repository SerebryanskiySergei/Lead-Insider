<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $ticketComment common\models\TicketComment*/

$confirmLink = Yii::$app->urlManager->createAbsoluteUrl(['ticket/view', 'id' => $ticketComment->ticket_id]);
?>
<h1>Здравствуйте!</h1>
<p>Уведомляем вас что служба поддержки ответила на ваше обращение.<br>
    <br>
    Просмотреть тикет можно можно по ссылке :<br>
    <?= Html::a(Html::encode($confirmLink), $confirmLink) ?><br>
</p>