<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$confirmLink = Yii::$app->urlManager->createAbsoluteUrl(['site/confirm-email', 'token' => $user->email_confirm_token]);
?>

<h1>Здравствуйте!</h1>
<p>Вы зарегестрировались на сайтe Lead.Insider.<br>
    <br>
Для подтверждения аккаунта пройдите по ссылке:<br>

<?= Html::a(Html::encode($confirmLink), $confirmLink) ?><br>
</p>
Если Вы не регистрировались на нашем сайте, то просто удалите это письмо.