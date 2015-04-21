<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "news".
 */
class News extends \common\models\base\News
{
    const NOVINKI= 0;
    const STOP_OFFER=1;
    const CHANGE_OFFER=2;
    const NEW_LENDING=3;
    const SYSTEM_TICKETS=4;
    const CHANGES_GEO=5;
    const SALES=6;

    public function rules()
    {
        return [
            [['title', 'text', 'category', 'create_date'], 'required'],
            [['text'], 'string'],
            [['category', 'offer_id'], 'integer'],
            [['title'], 'string', 'max' => 255]
        ];
    }
    public function afterSave($insert, $changedAttributes)
    {
        if($insert){
            $users = User::find()->where(['status'=>User::STATUS_ACTIVE])->all();
            $title ="";
            switch ($this->category) {
                case 0:
                    $title =  "Новинки";
                    break;
                case 1:
                    $title = "Приостановка оффера";
                    break;
                case 2:
                    $title = "Изменение оффера";
                    break;
                case 3:
                    $title = "Новые лендинги";
                    break;
                case 4:
                    $title = "Системные тикеты";
                    break;
                case 5:
                    $title = "Изменения ГЕО";
                    break;
                case 6:
                    $title = "Акции";
                    break;
            }
            foreach($users as $user) {
                Yii::$app->mailer->compose('newsCreated', ['news' => $this])
                    ->setFrom([Yii::$app->params['supportEmail'] => "Lead.Insider"])
                    ->setTo($user->email)
//                    ->setTo('imvioley@gmail.com')
                    ->setSubject('Lead.Insider | '.$title)
                    ->send();
            }
        }
    }
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Заголовок'),
            'text' => Yii::t('app', 'Текст новости'),
            'category' => Yii::t('app', 'Категория'),
            'create_date' => Yii::t('app', 'Дата публикации'),
            'offer_id' => Yii::t('app', 'Привязанный оффер'),
        ];
    }
}
