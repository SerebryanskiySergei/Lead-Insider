<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
* @var yii\web\View $this
* @var common\models\SystemInfo[] $data
*/

$this->title = 'System Infos';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="system-info-index">
<div class="col-xs-6 col-xs-offset-3">
    <ul class="list-group">
        <?
        foreach($data as $item){
//            var_dump($item);exit;
            echo "<li class=\"list-group-item\"><span class=\"badge\">".$item->value;
            echo "</span>";
            switch($item->key){
                case "Clear benefits":
                    echo "Чистая прибыль";break;
                case "Offer count":
                    echo "Количество офферов";break;
                case "Webmaster count":
                    echo "Количество вебмастеров";break;
                case "Val benefits":
                    echo "Валовая прибыль";break;
            }
            echo "</li>";
        }
        ?>

    </ul>
</div>
</div>
