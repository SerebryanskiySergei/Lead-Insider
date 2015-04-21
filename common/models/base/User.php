<?php

namespace common\models\base;

use Yii;

/**
 * This is the base-model class for table "user".
 *
 * @property integer $id
 * @property string $password_hash
 * @property string $auth_key
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $name
 * @property string $surname
 * @property string $phone
 * @property double $balance
 * @property string $ref
 * @property string $role
 * @property string $email_confirm_token
 *
 * @property Payment[] $payments
 * @property Statistic[] $statistics
 * @property Ticket[] $tickets
 * @property TicketComment[] $ticketComments
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['password_hash', 'auth_key', 'email', 'created_at', 'updated_at', 'ref'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['balance'], 'number'],
            [['role'], 'string'],
            [['password_hash', 'password_reset_token', 'email', 'name', 'surname', 'phone', 'ref', 'email_confirm_token'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'email' => Yii::t('app', 'Email'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'name' => Yii::t('app', 'Name'),
            'surname' => Yii::t('app', 'Surname'),
            'phone' => Yii::t('app', 'Phone'),
            'balance' => Yii::t('app', 'Balance'),
            'ref' => Yii::t('app', 'Ref'),
            'role' => Yii::t('app', 'Role'),
            'email_confirm_token' => Yii::t('app', 'Email Confirm Token'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(\common\models\Payment::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatistics()
    {
        return $this->hasMany(\common\models\Statistic::className(), ['user_ref_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTickets()
    {
        return $this->hasMany(\common\models\Ticket::className(), ['sender_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTicketComments()
    {
        return $this->hasMany(\common\models\TicketComment::className(), ['author_id' => 'id']);
    }
}
