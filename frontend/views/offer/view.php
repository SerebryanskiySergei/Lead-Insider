<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/**
* @var yii\web\View $this
* @var common\models\Offer $model
*/

$this->title = 'Просмотр оффера ' . $model->title . '';
$this->params['breadcrumbs'][] = ['label' => 'Офферы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;
$bundle = \backend\assets\AppAsset::register($this);
?>


<!-- Begin: Content -->
<section id="content">

    <div id="content">

        <div class="table-layout">
            <div class="w200 text-center pr30">
                <img class="responsive" src="<?=$bundle->baseUrl?>/img/offers/<?=$model->id?>.jpg">


            </div>
            <div class="va-t m30">

                <h2 style="margin-top:0px;"><?=$model->title?><small> <?=$model->action->title?> </small></h2>
                <p >Вебсайт: <a target="_blank" href="<?=$model->site?>"><?=$model->site?></a></p>
                <p >Дата добавления оффера: <?=Yii::$app->formatter->asDate($model->create_time)?></p>
                <a  style="width:150px;" href="<?=\yii\helpers\Url::toRoute(['statistic','id'=>$model->id])?>" class="btn btn-success btn-gradient dark btn-block">Статистика</a>
            </div>
        </div>


        <div class="p25 pt35">
            <div class="row">
                <div class="col-md-4">
                    <div class="panel">
                        <div class="panel-heading">
                                    <span class="panel-icon"><i class="fa fa-trophy"></i>
                                    </span>
                            <span class="panel-title"> Ваша реф. ссылка</span>
                        </div>
                        <div class="panel-body pb5">
                            <dl class="dl-horizontal">
                                <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-bolt"></i>
                                                </span>
                                    <input style="width:100%;" type="text"  class="form-control zip" value="<?=$model->site.'?LIref='.$ref.'&LIaction='.$model->action->id.'&LIregion='.$model->region->ref_cod?>" readonly>
                                </div>
                            </dl>


                        </div>
                    </div>

                    <div class="panel">
                        <div class="panel-heading">
                                    <span class="panel-icon"><i class="fa fa-trophy"></i>
                                    </span>
                            <span class="panel-title"> Параметры</span>
                        </div>
                        <div class="panel-body pb5">
                            <dl class="dl-horizontal">
                                <dt>Холд</dt>
                                <dd><?=$model->hold?> дней</dd>
                                <dt>Таргетинг</dt>
                                <dd><?=$model->region->title?></dd>
                                <dt>Постклик</dt>
                                <dd><?=$model->postclick?> дней</dd>
                                <dt>Кол-во лидов в сутки</dt>
                                <dd><?=$model->lead?></dd>
                                <dt>Оплата</dt>
                                <dd><?=$model->price?> рублей</dd>
                            </dl>


                        </div>
                    </div>

                    <div class="panel">
                        <div class="panel-heading">
                                    <span class="panel-icon"><i class="fa fa-star"></i>
                                    </span>
                            <span class="panel-title"> Источники трафика</span>
                        </div>
                        <div class="panel-body pn">
                            <table class="table mbn tc-icon-1 tc-med-2 tc-bold-last">
                                <thead>

                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <span class="fa <?if($model->traff_1=="Y") echo " fa-check text-success";else echo" fa-times text-danger";?> pr5"></span>
                                    </td>
                                    <td>Дорвеи</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="fa <?if($model->traff_2=="Y") echo " fa-check text-success";else echo" fa-times text-danger";?> pr5"></span>
                                    </td>
                                    <td>Баннерная реклама</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="fa <?if($model->traff_3=="Y") echo " fa-check text-success";else echo" fa-times text-danger";?> pr5"></span>
                                    </td>
                                    <td>Контекстная реклама</td>
                                    <td></td>
                                </tr><tr>
                                    <td>
                                        <span class="fa <?if($model->traff_4=="Y") echo " fa-check text-success";else echo" fa-times text-danger";?> pr5"></span>
                                    </td>
                                    <td>Контекстная реклама на бренд</td>
                                    <td></td>
                                </tr><tr>
                                    <td>
                                        <span class="fa <?if($model->traff_5=="Y") echo " fa-check text-success";else echo" fa-times text-danger";?> pr5";></span>
                                    </td>
                                    <td>Тизерная реклама</td>
                                    <td></td>
                                </tr><tr>
                                    <td>
                                        <span class="fa <?if($model->traff_6=="Y") echo " fa-check text-success";else echo" fa-times text-danger";?> pr5";></span>
                                    </td>
                                    <td>Таргетированная реклама</td>
                                    <td></td>
                                </tr><tr>
                                    <td>
                                        <span class="fa <?if($model->traff_7=="Y") echo " fa-check text-success";else echo" fa-times text-danger";?> pr5";></span>
                                    </td>
                                    <td>Социальные сети</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="fa <?if($model->traff_8=="Y") echo " fa-check text-success";else echo" fa-times text-danger";?> pr5"></span>
                                    </td>
                                    <td>Почтовые рассылки</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="fa <?if($model->traff_9=="Y") echo " fa-check text-success";else echo" fa-times text-danger";?> pr5"></span>
                                    </td>
                                    <td>Брокеры</td>
                                    <td></td>
                                </tr><tr>
                                    <td>
                                        <span class="fa <?if($model->traff_10=="Y") echo " fa-check text-success";else echo" fa-times text-danger";?> pr5"></span>
                                    </td>
                                    <td>Cashback</td>
                                    <td></td>
                                </tr><tr>
                                    <td>
                                        <span class="fa <?if($model->traff_11=="Y") echo " fa-check text-success";else echo" fa-times text-danger";?> pr5";></span>
                                    </td>
                                    <td>Другое</td>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>





                </div>
                <div class="col-md-8">

                    <div class="tab-block psor">

                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab1" data-toggle="tab">Описание</a>
                            </li>


                            <li class="pull-right hidden">
                                <a href="#tab4" class="ph15" data-toggle="tab">
                                    <span class="fa fa-gear fs14"></span>
                                </a>
                            </li>

                        </ul>
                        <div class="tab-content" style="height: 725px;">
                            <div id="tab1" class="tab-pane active p15">
                                <span><?=$model->caption?></span>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>






    </div>

</section>
<!-- End: Content -->