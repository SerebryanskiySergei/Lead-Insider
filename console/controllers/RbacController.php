<?php
namespace console\controllers;
use Yii;
use yii\console\Controller;
use common\components\rbac\UserRoleRule;
class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll(); //удаляем старые данные

        //Создадим для примера права для доступа к админке
        $dashboard = $auth->createPermission('dashboard');
        $dashboard->description = 'Панель вебмастера';
        $auth->add($dashboard);

        $adminka = $auth->createPermission('adminka');
        $adminka->description = "Адинка";
        $auth->add($adminka);

        $advertboard = $auth->createPermission('advertboard');
        $advertboard->description="Панель рекламодателя";
        $auth->add($advertboard);

        //Включаем наш обработчик
        $rule = new UserRoleRule();
        $auth->add($rule);

        //Добавляем роли
        $webmaster = $auth->createRole('webmaster');
        $webmaster->description = 'Вебмастер';
        $webmaster->ruleName = $rule->name;
        $auth->add($webmaster);
        $auth->addChild($webmaster,$dashboard);

        $advertiser = $auth->createRole('advertiser');
        $advertiser->description = 'Рекламодатель';
        $advertiser->ruleName = $rule->name;
        $auth->add($advertiser);

        //Добавляем потомков
        $auth->addChild($advertiser, $webmaster);
        $auth->addChild($advertiser, $advertboard);

        $admin = $auth->createRole('admin');
        $admin->description = 'Администратор';
        $admin->ruleName = $rule->name;
        $auth->add($admin);
        $auth->addChild($admin, $webmaster);
        $auth->addChild($admin,$adminka);
    }
}