
<?php
/* @var $this yii\web\View */


$this->title = 'Ваша статистика';
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- Begin: Content -->
<section id="content">


    <div id="content">

        <div class="table-layout">

            <div class="va-t m30">

                <h2 style="margin-top:0px;"> Общая статистика</h2>

            </div>
        </div>


        <div class="p25 pt35">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-visible">
                        <div class="panel-heading br-b-n">
                            <div class="panel-title hidden-xs">
                                <span class="glyphicon glyphicon-tasks"></span>Статистика по офферам</div>
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
                                    <th>EPC</th>
                                    <th>Холд</th>
                                    <th>Профит</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?
                                foreach($statistic as $stat){
                                    echo"<tr><td>".$stat->date."</td><td>".$stat->hits."</td>
                                    <td>".$stat->visitors."</td>
                                    <td>".$stat->tb."</td>
                                    <td>".$stat->leads."</td>
                                    <td>".$stat->offer->cpe."</td>
                                    <td>".$stat->hold."</td>
                                    <td>".$stat->profit."</td>
                                    </tr>";
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



    </div>
</section>
<!-- End: Content -->