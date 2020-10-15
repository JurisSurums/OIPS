<?php

namespace backend\controllers;

use yii\console\Controller;
use Yii;
use yii\helpers\FileHelper;
use common\models\Mailo;
use common\models\User;

/**
 * Sanding mail
 * Class MailController
 * @package app\commands
 */
class MailController extends Controller
{
    public $from = 'jurkrisur@gmail.com';
    public $to = 'juris.surums@gmail.com';

/*
Yii::$app->mailer->compose($type, ['data' => $data])
->setFrom($this->from)
->setTo($this->to)
->setSubject($this->subjects[$type])
->send();*/

    public function actionUpload()
    {
        $model = new Mailo();
        $emailo = new User();
        if (Yii::$app->request->isPost) { // pressed the button
            $post = Yii::$app->request->post();
/*            var_dump("heyyyo");
            exit;*/
            $recepiants = $emailo::find()->all();
            var_dump($recepiants[0]);
            /*foreach ($recepiants as $r)
            {
                var_dump($r);
            }*/
            exit;
            foreach ($recepiants as $r)
            {
                Yii::$app->mailer->compose('@common/mail/reminder')
                    ->setFrom($this->from)
                    ->setTo($this->to)
                    ->setSubject($post['Mailo']['temats'])
                    ->send();
            }
        }
        return $this->render('upload', ['model' => $model]);
    }
}
