<?php
namespace frontend\models;

use common\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $email;
    public $password;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Пользователь с таким email уже существует'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->email = $this->email;
            $user->name= $this->email;
            $user->setPassword($this->password);
            $user->ref=Yii::$app->security->generateRandomString();
            $user->status=User::STATUS_WAITING_VALIDATION;
            $user->generateEmailConfirmToken();
            $user->generateAuthKey();
            if ($user->save()) {
                Yii::$app->mailer->compose('confirmEmail', ['user' => $user])
                    ->setFrom([Yii::$app->params['supportEmail'] => "Lead.Insider"])
                    ->setTo($this->email)
                    ->setSubject('Подтверждение регистрации на Lead.Insider')
                    ->send();
                return $user;
            }
        }

        return null;
    }
}
