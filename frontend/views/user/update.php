<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\User $model
 */

$this->title = 'Кабинет пользователя' . $model->username . '';
$this->params['breadcrumbs'][] = 'Настройка аккаунта';
?>


<!-- Begin: Content -->
<section id="content">


    <div id="content">

        <div class="table-layout">

            <div class="va-t m30">

                <h2 style="margin-top:0px;"> Общее</h2>

            </div>
        </div>


        <div class="p25 pt35">
            <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal" method="post" role="form" action="<?=\yii\helpers\Url::toRoute(['user/update','id'=>Yii::$app->user->getId()])?>">
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Имя</label>
                            <div class="col-lg-8">
                                <input type="text" name="User[name]" id="inputStandard" class="form-control" placeholder="<?=$model->name?>" value="<?=$model->name?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Фамилия</label>
                            <div class="col-lg-8">
                                <input type="text" name="User[surname]" id="inputStandard" class="form-control" placeholder="<?=$model->surname?>" value="<?=$model->surname?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Телефон</label>
                            <div class="col-lg-8">
                                <input type="text" name="User[phone]" id="maskedPhone" class="form-control phone" maxlength="10" autocomplete="off" placeholder="<?=$model->phone?>" value="<?=$model->phone?>">
                            </div>
                        </div>
                        <input type="hidden" name="_csrf" value="nT2U2jEvCzUej3sFTtF0E_SJD2VvFCJS">
                        <button type="submit" style="width:200px; margin-right:10%;" class="btn btn-success btn-gradient dark btn-block pull-right">Сохранить</button>
                    </form>
                </div>



            </div>
        </div>

        <div class="table-layout">

            <div class="va-t m30">

                <h2 style="margin-top:0px;"> Выплата</h2>

            </div>
        </div>

        <div class="p25 pt35">
            <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal" role="form" method="post" action="<?=\yii\helpers\Url::toRoute('payment/create')?>">
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Кошелек WMR</label>
                            <div class="col-lg-8">
                                <input type="text" name="Payment[wmid]" id="inputStandard" class="form-control" placeholder="WMR">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Сумма</label>
                            <div class="col-lg-8">
                                <input type="text" name="Payment[count]" id="inputStandard" class="form-control" placeholder="рубли">
                            </div>
                        </div>
                        <input type="hidden" name="_csrf" value="nT2U2jEvCzUej3sFTtF0E_SJD2VvFCJS">
                        <button type="submit" style="width:200px; margin-right:10%;" class="btn btn-success btn-gradient dark btn-block pull-right">Запросить</button>
                    </form>
                </div>
            </div>
        </div>


    </div>

</section>
<!-- End: Content -->
