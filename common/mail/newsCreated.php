<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $news common\models\News */

?>
<h1>У нас новости!</h1>
<p>
    <h4><?=Html::encode($news->title)?></h4>
    <?=Html::encode($news->text)?>
</p>