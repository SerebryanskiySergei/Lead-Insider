<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "statistic_data".
 */
class StatisticData extends \common\models\base\StatisticData
{
    public function afterSave($insert, $changedAttributes)
    {
        if(!$insert && isset($changedAttributes['status'] ) && $this->good_region=="Y"){
            $statistic= Statistic::findOne($this->stat_id);
            $offer = Offer::findOne($statistic->offer_id);
            $benefit = intval((($offer->price)/100)*(100-$offer->our_percent));
            $systembenefit = $offer->price - $benefit;

            if($changedAttributes['status']=='waiting'){
                $statistic->question--;
                if($this->status == 'banned'){
                    $statistic->hold-=$benefit;
                    $statistic->warning++;
                    $statistic->save();
                }
                if($this->status == 'confirmed'){
                    $statistic->profit += $benefit;
                    $user = User::findOne($statistic->user_ref_id);
                    $user->balance+=$benefit;
                    $statistic->hold -=$benefit;
                    $statistic->confirmed++;
                    $statistic->save();
                    $user->save();
                    $sysBen = SystemInfo::findOne(['key'=>'Clear benefits']);
                    $sysBen->value = (int)$sysBen->value +$systembenefit;
                    $sysBen->save();
                    $sysBen = SystemInfo::findOne(['key'=>'Val benefits']);
                    $sysBen->value = (int)$sysBen->value +$offer->price;
                    $sysBen->save();
                }
            }
            if($changedAttributes['status']=='confirmed'){
                $statistic->confirmed--;
                if($this->status == 'waiting'){
                    $statistic->hold+=$benefit;
                    $user = User::findOne($statistic->user_ref_id);
                    $user->balance-=$benefit;
                    $statistic->profit -= $benefit;
                    $statistic->question++;
                    $statistic->save();
                    $user->save();
                    $sysBen = SystemInfo::findOne(['key'=>'Clear benefits']);
                    $sysBen->value = (int)$sysBen->value -$systembenefit;
                    $sysBen->save();
                    $sysBen = SystemInfo::findOne(['key'=>'Val benefits']);
                    $sysBen->value = (int)$sysBen->value -$offer->price;
                    $sysBen->save();
                }
                if($this->status == 'banned'){
                    $user = User::findOne($statistic->user_ref_id);
                    $user->balance-=$benefit;
                    $statistic->profit -= $benefit;
                    $statistic->warning++;
                    $statistic->save();
                    $user->save();
                    $sysBen = SystemInfo::findOne(['key'=>'Clear benefits']);
                    $sysBen->value = (int)$sysBen->value -$systembenefit;
                    $sysBen->save();
                    $sysBen = SystemInfo::findOne(['key'=>'Val benefits']);
                    $sysBen->value = (int)$sysBen->value -$offer->price;
                    $sysBen->save();
                }
            }
            if($changedAttributes['status']=='banned'){
                $statistic->warning--;
                if($this->status == 'waiting'){
                    $statistic->hold+=$benefit;
                    $statistic->question++;
                    $statistic->save();
                }
                if($this->status == 'confirmed'){
                    $statistic->profit += $benefit;
                    $user = User::findOne($statistic->user_ref_id);
                    $user->balance+=$benefit;
                    $statistic->confirmed++;
                    $statistic->save();
                    $user->save();
                    $sysBen = SystemInfo::findOne(['key'=>'Clear benefits']);
                    $sysBen->value = (int)$sysBen->value +$systembenefit;
                    $sysBen->save();
                    $sysBen = SystemInfo::findOne(['key'=>'Val benefits']);
                    $sysBen->value = (int)$sysBen->value +$offer->price;
                    $sysBen->save();
                }
            }

        }
        elseif($insert && $this->good_region == "Y"){
            $statistic= Statistic::findOne($this->stat_id);
            $offer = Offer::findOne($statistic->offer_id);
            $benefit = intval((($offer->price)/100)*(100-$offer->our_percent));
            $statistic->hold+= $benefit;
            $statistic->question++;
            $statistic->leads++;
            $statistic->save();
        }
    }
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'stat_id' => Yii::t('app', 'Ячейка статистики'),
            'data' => Yii::t('app', 'Заполненные данные'),
            'good_region' => Yii::t('app', 'Таргетинг'),
            'status' => Yii::t('app', 'Статус'),
        ];
    }

}
