<?php

namespace console\controllers;

use console\models\UserRoleRule;
use yii\console\Controller;

/**
 * Controller for generate access rules.
 */
class RbacController extends Controller
{
    public function actionInit(): void
    {
        $auth = \Yii::$app->authManager;
        $auth->removeAll();

        $rule = new UserRoleRule();
        $auth->add($rule);

        $user = $auth->createRole('user');
        $user->description = 'RegularUser';
        $user->ruleName = $rule->name;
        $auth->add($user);

        $admin = $auth->createRole('admin');
        $admin->description = 'AdminUser';
        $admin->ruleName = $rule->name;
        $auth->add($admin);

        $auth->addChild($admin, $user);
    }
}
