<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
* @var common\models\OfferSearch $searchModel
* @var common\models\Offer[] $offers
*/

$this->title = 'Offers';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Start: Topbar -->
<header id="topbar">
    <div class="topbar-left">
        <ol class="breadcrumb">
            <li class="crumb-active">
                <a href="dashboard.html">Офферы</a>
            </li>
            <li class="crumb-active">
                <a href="dashboard.html">Мои офферы</a>
            </li>
        </ol>
    </div>

</header>
<!-- End: Topbar -->

<!-- Begin: Content -->
<section id="content">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-visible">
                <div class="panel-heading br-b-n">
                    <div class="panel-title hidden-xs">
                        <span class="glyphicon glyphicon-tasks"></span>Офферы</div>
                </div>
                <div class="panel-body pn">
                    <table class="table table-striped table-bordered table-hover" id="datatable" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Название</th>
                            <th>Оплачиваемая цель</th>
                            <th>Цена</th>
                            <th>Регион</th>
                            <th>Лиды</th>
                            <th>CPE</th>
                            <th>Холд</th>
                            <th>Доступ</th>
                        </tr>
                        </thead>
                        <tbody>
                        <? foreach($offers as $offer){ ?>
                        <tr>
                            <td><a href="#"><?= $offer->title ?></a></td>
                            <td><?= $offer->action->title ?></td>
                            <td><?= $offer->price ?> руб.</td>
                            <td><?= $offer->region ?></td>
                            <td><?= $offer->lead ?></td>
                            <td><?= $offer->cpe ?></td>
                            <td><?= $offer->hold ?></td>
                            <td><? if ($offer->accessType->title == 'Доступ')
                                    echo "<button style=\"width:100%;\" class=\"btn btn-primary btn-sm\" type=\"button\"> Получить </button>";
                                elseif ($offer->accessType->title == 'Перейти') {
                                    echo "<a href='";
                                    echo \yii\helpers\Url::toRoute(['view','id'=>$offer->id]);
                                    echo "' style=\"width:100%;\" class=\"btn btn-primary btn-sm\" type=\"button\"> Перейти </a>";
                                }

                                ?>
                            </td>
                        </tr>
                        <? }?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>



    </div>
</section>
<!-- End: Content -->