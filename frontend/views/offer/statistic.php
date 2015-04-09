<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var common\models\Offer $model
 * @var common\models\Statistic[] $statistic
 */

$this->title = 'Offer View ' . $model->title . '';
$this->params['breadcrumbs'][] = ['label' => 'Offers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'View';
$bundle=\frontend\assets\AppAsset::register($this);
?>

<!-- Start: Topbar -->
<header id="topbar">
    <div class="topbar-left">
        <ol class="breadcrumb">
            <li class="crumb-active">
                <a href="<?=\yii\helpers\Url::toRoute('offer/index')?>">Офферы</a>
            </li>
            <li class="crumb-active">
                <a href="<?=\yii\helpers\Url::toRoute('user/allstatistic')?>">Мои офферы</a>
            </li>
        </ol>
    </div>

</header>
<!-- End: Topbar -->

<!-- Begin: Content -->
<section id="content">


    <div id="content">

        <div class="table-layout">
            <div class="w200 text-center pr30">
                <img class="responsive" src="<?=$bundle->baseUrl?>/img/avatars/2.jpg ">


            </div>
            <div class="va-t m30">

                <h2 style="margin-top:0px;"> Название оффера<small> Оплачиваемое действие </small></h2>
                <p >Вебсайт: <a href="http://google.com">http://google.com</a></p>
                <p >Дата добавления оффера: 27/05/15</p>
                <a  style="width:150px;" href="#" class="btn btn-success btn-gradient dark btn-block">Статистика</a>



            </div>
        </div>


        <div class="p25 pt35">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-visible">
                        <div class="panel-heading br-b-n">
                            <div class="panel-title hidden-xs">
                                <span class="glyphicon glyphicon-tasks"></span>Статистика по офферу</div>
                        </div>
                        <div class="panel-body pn">
                            <table class="table table-striped table-bordered table-hover" id="datatable" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Дата</th>
                                    <th>Хиты</th>
                                    <th>Посетители</th>
                                    <th>ТБ</th>
                                    <th>Лиды</th>
<!--                                    <th><span class="fa fa-check"></span></th>-->
<!--                                    <th><span class="fa fa-question"></span></th>-->
<!--                                    <th><span class="fa fa-exclamation-triangle"></th>-->
                                    <th>EPC</th>
                                    <th>Холд</th>
                                    <th>Профит</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?
                                    foreach($statistic as $stat){
                                        echo "<tr>
                                    <td>".$stat->date."</td>
                                    <td>".$stat->hits."</td>
                                    <td>".$stat->visitors."</td>
                                    <td>".$stat->tb."</td><td>".
                                            $stat->leads."</td><td>".
                                            $stat->offer->cpe."</td><td>".
                                            $stat->hold."</td><td>".
                                            $stat->profit."</td></tr>";
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>



            </div>
        </div>






    </div>

</section>
<!-- End: Content -->

