<?php

namespace common\models\base;

use Yii;

/**
 * This is the base-model class for table "payment".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $wmid
 * @property string $count
 * @property string $status
 *
 * @property User $user
 */
class Payment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'wmid', 'count', 'status'], 'required'],
            [['user_id'], 'integer'],
            [['status'], 'string'],
            [['wmid', 'count'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'wmid' => Yii::t('app', 'Wmid'),
            'count' => Yii::t('app', 'Count'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\common\models\User::className(), ['id' => 'user_id']);
    }
}
