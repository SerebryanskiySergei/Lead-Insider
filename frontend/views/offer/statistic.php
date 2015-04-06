<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var common\models\Offer $model
 */

$this->title = 'Offer View ' . $model->title . '';
$this->params['breadcrumbs'][] = ['label' => 'Offers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'View';
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


    <div id="content">

        <div class="table-layout">
            <div class="w200 text-center pr30">
                <img class="responsive" src="assets/img/avatars/2.jpg ">


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
                                    <th><span class="fa fa-check"></span></th>
                                    <th><span class="fa fa-question"></span></th>
                                    <th><span class="fa fa-exclamation-triangle"></th>
                                    <th>EPC</th>
                                    <th>Холд</th>
                                    <th>Профит</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>2014/09/25</td>
                                    <td>1</td>
                                    <td>110</td>
                                    <td>61</td>
                                    <td>2</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>61</td>
                                    <td>2</td>
                                    <td>120 руб.</td>
                                    <td>480 руб.</td>
                                </tr>
                                <tr>
                                    <td>2014/09/25</td>
                                    <td>1</td>
                                    <td>110</td>
                                    <td>61</td>
                                    <td>2</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>61</td>
                                    <td>2</td>
                                    <td>120 руб.</td>
                                    <td>480 руб.</td>
                                </tr><tr>
                                    <td>2014/09/25</td>
                                    <td>1</td>
                                    <td>110</td>
                                    <td>61</td>
                                    <td>2</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>61</td>
                                    <td>2</td>
                                    <td>120 руб.</td>
                                    <td>480 руб.</td>
                                </tr><tr>
                                    <td>2014/09/25</td>
                                    <td>1</td>
                                    <td>110</td>
                                    <td>61</td>
                                    <td>2</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>61</td>
                                    <td>2</td>
                                    <td>120 руб.</td>
                                    <td>480 руб.</td>
                                </tr><tr>
                                    <td>2014/09/25</td>
                                    <td>1</td>
                                    <td>110</td>
                                    <td>61</td>
                                    <td>2</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>61</td>
                                    <td>2</td>
                                    <td>120 руб.</td>
                                    <td>480 руб.</td>
                                </tr><tr>
                                    <td>2014/09/25</td>
                                    <td>1</td>
                                    <td>110</td>
                                    <td>61</td>
                                    <td>2</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>61</td>
                                    <td>2</td>
                                    <td>120 руб.</td>
                                    <td>480 руб.</td>
                                </tr><tr>
                                    <td>2014/09/25</td>
                                    <td>1</td>
                                    <td>110</td>
                                    <td>61</td>
                                    <td>2</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>61</td>
                                    <td>2</td>
                                    <td>120 руб.</td>
                                    <td>480 руб.</td>
                                </tr>
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

