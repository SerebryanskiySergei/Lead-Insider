<?
/**
 * @var yii\web\View $this
 * @var common\models\Ticket[] $tickets
 * @var common\models\Ticket $model
 */
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;



$this->title = 'Тикеты';
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

                                    <form class="section row mbn" action="<?=\yii\helpers\Url::toRoute('ticket/create');?>" method="post">
                                        <? ?>
                                        <div class="section mb10">
                                            <div class="va-t ">
                                                <h2 style="margin-top:0px;"> Новый тикет</h2>
                                            </div>
                                            <label for="name2" class="field prepend-icon">
                                                <input type="text" name="Ticket[title]" id="name2" class="event-name gui-input br-light light" placeholder="Заголовок">
                                                <label for="name2" class="field-icon">
                                                    <i class="fa fa-tag"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
                                        <div class="section mb10">
                                            <label class="field prepend-icon">
                                                <textarea style="height: 160px;" class="gui-textarea br-light bg-light" id="comment" name="Ticket[message]" placeholder="Сообщение"></textarea>
                                                <label for="comment" class="field-icon">
                                                    <i class="fa fa-comments"></i>
                                                </label>
                                            </label>
                                        </div>
<!--                                        --><?//= Html::submitButton('Отправить', ['class' => 'btn btn-primary btn-gradient']) ?>
                                        <button class="btn btn-primary btn-gradient" type="submit"> Отправить </button>
                                    </form>


                                </div>

                            </div>
                        </div>
                        <div class="panel-body pn">
                            <table class="table table-striped table-bordered table-hover" id="datatable" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Заголовок</th>
                                    <th>Сообщение</th>
                                    <th>Статус</th>
                                    <th>Подробнее</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?foreach ($tickets as $ticket){
                                    echo"<td>".Html::encode($ticket->title)."</td><td>".Html::encode($ticket->message)."</td>";
                                    if($ticket->status==\common\models\Ticket::STATUS_HAVE_ANSWER)
                                        echo"<td>Есть ответ</td>";
                                    elseif($ticket->status==\common\models\Ticket::STATUS_WAITING_ANSWER)
                                        echo"<td>Ожидание ответа</td>";
                                    echo "<td><a href=\"".\yii\helpers\Url::toRoute(['ticket/view','id'=>$ticket->id])."\" style=\"width:100%;\" class=\"btn btn-primary btn-sm\" type=\"button\"> Перейти </a></td></tr>";
                                } ?>

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

