<?php
/**
 * @var yii\web\View $this
 * @var common\models\Ticket $ticket
 * @var common\models\TicketComment[] $comments
 */


$this->title = 'Тикет ' . $ticket->title . '';
$this->params['breadcrumbs'][] = ['label' => 'Тикеты', 'url' => ['index']];
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


                                            <h2 style="margin-top:0px;"><?=$ticket->title?></h2>

                                        </div>
                                        <blockquote class="blockquote-alert blockquote-rounded mv10">
                                            <p><?=$ticket->message?></p>
                                            <small>Ваше сообщение</small>
                                        </blockquote>
                                        <?
                                        foreach($comments as $comment){
                                            if($comment->author_id!=Yii::$app->user->getId()) {
                                                echo "<blockquote class=\"blockquote-alert blockquote-reverse blockquote-rounded mv10\"><p>";
                                                echo $comment->text . "</p><small>Агент Поддержки</small></blockquote>";
                                            }
                                            else{
                                                echo "<blockquote class=\"blockquote-alert blockquote-rounded mv10\"><p>";
                                                echo $comment->text . "</p><small>Ваше сообщение</small></blockquote>";
                                            }
                                        }
                                        ?>
                                        <form method="post" action="<?=\yii\helpers\Url::toRoute('ticket-comment/create');?>">
                                        <div class="section mb10">
                                            <label class="field prepend-icon">
                                                <textarea style="height: 160px;" class="gui-textarea br-light bg-light" id="comment" name="TicketComment[text]" placeholder="Сообщение"></textarea>
                                                <label for="comment" class="field-icon">
                                                    <i class="fa fa-comments"></i>
                                                </label>
                                            </label>
                                            <input type="hidden" name="TicketComment[ticket_id]" value="<?=$ticket->id;?>" />
                                            <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
                                        </div>
                                        <button class="btn btn-primary btn-gradient" type="submit"> Отправить </button>
                                        </form>
                                    </div>


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