<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var common\models\News[] $news
 * @var array[] $dates
 */

$this->title = 'Новости';
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- Begin: Content -->
<section id="content">


    <div id="content">



        <div class="p25 ">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel mb25 ">

                        <div class="panel-body p20 pb10">
                            <div class="tab-content pn br-n admin-form">
                                <div id="tab1_1" class="tab-pane active">

                                    <div class="section row mbn">
                                        <div class="section mb10">


                                            <?
                                            if($dates[0]) {
                                                foreach ($dates as $date) {
                                                    echo "<h3 style=\"margin-top:0px;\"> Новости за ".$date['create_date']."</h3>";
                                                    foreach ($news as $new) {
                                                        if ($new->create_date == $date['create_date']) {
                                                            echo "<blockquote class=\"";
                                                            switch ($new->category) {
                                                                case 0:
                                                                    echo "blockquote-danger";
                                                                    break;
                                                                case 1:
                                                                    echo "blockquote-warning";
                                                                    break;
                                                                case 2:
                                                                    echo "blockquote-alert";
                                                                    break;
                                                                case 3:
                                                                    echo "blockquote-system";
                                                                    break;
                                                                case 4:
                                                                    echo "blockquote-success";
                                                                    break;
                                                                case 5:
                                                                    echo "blockquote-primary";
                                                                    break;
                                                                case 6:
                                                                    echo "blockquote-info";
                                                                    break;
                                                            }
                                                            echo "\"><p><strong>" . Html::encode($new->title) . " </strong><br> " . $new->text . "</p>";
                                                            echo "<small><span class=\"text-info\">Категория: ";
                                                            switch ($new->category) {
                                                                case 0:
                                                                    echo "Новинки";
                                                                    break;
                                                                case 1:
                                                                    echo "Приостановка оффера";
                                                                    break;
                                                                case 2:
                                                                    echo "Изменение оффера";
                                                                    break;
                                                                case 3:
                                                                    echo "Новые лендинги";
                                                                    break;
                                                                case 4:
                                                                    echo "Системные тикеты";
                                                                    break;
                                                                case 5:
                                                                    echo "Изменения ГЕО";
                                                                    break;
                                                                case 6:
                                                                    echo "Акции";
                                                                    break;
                                                            }
                                                            echo "</span>";
                                                            if ($new->category == 1 || $new->category == 2 || $new->category == 0)
                                                                echo " | <a href=\"" . \yii\helpers\Url::toRoute(['offer/view', 'id' => $new->offer_id]) . "\">Перейти к офферу</a>";
                                                            echo "</small></blockquote>";
                                                        }
                                                    }
                                                }
                                            }
                                            else{
                                                echo "<h3 style=\"margin-top:0px;\"> Для вас нет новостей</h3>";
                                            }


                                            ?>

                                        <hr>

                                    </div>


                                </div>

                            </div>
                        </div>

                    </div>
                </div>



            </div>
        </div>





    </div>

</section>
<!-- End: Content -->