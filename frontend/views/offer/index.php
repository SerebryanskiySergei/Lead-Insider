<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
* @var common\models\OfferSearch $searchModel
* @var common\models\Offer[] $offers
*/

$this->title = 'Офферы';
$this->params['breadcrumbs'][] = $this->title;
?>
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

                        <?
                        foreach($offers as $offer){ ?>
                        <tr>
                            <td><span style="font-weight: bold;"><?= Html::encode($offer->title) ?></span></td>
                            <td><?= Html::encode($offer->action->title) ?></td>
                            <td><?= Html::encode(intval((($offer->price)/100)*(100-$offer->our_percent))) ?> руб.</td>
                            <td><?= Html::encode($offer->region->title) ?></td>
                            <td><?= Html::encode($offer->lead) ?></td>
                            <td><?= Html::encode($offer->cpe) ?></td>
                            <td><?= Html::encode($offer->hold) ?></td>
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