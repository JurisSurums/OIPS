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
        $model = new Mailo(); //dont need
        $emailo = new User();
        if (Yii::$app->request->isPost) { // pressed the button
            $post = Yii::$app->request->post();
            $recepiants = $emailo::find()->from('user')->all();
            $model->createEmail($post['Mailo']['temats'], $post['Mailo']['saturs']);
/*
            if ( !is_dir( '@backend/web/emails/' ) ) {
                var_dump("pastāv");
            }
            else
            {
                var_dump("nepastāv");
            }
            exit;*/
            foreach ($recepiants as $r)
            {
                Yii::$app->mailer->compose('@backend/web/emails/'.$post['Mailo']['temats'])
                    ->setFrom($this->from)
                    ->setTo($r["email"])
                    ->setSubject($post['Mailo']['temats'])
                    ->send();
            }
        }
        return $this->render('upload', ['model' => $model]);
    }
}
