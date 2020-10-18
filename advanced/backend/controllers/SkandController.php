<?php
namespace backend\controllers;

use Yii;
use yii\helpers\FileHelper;
use yii\web\Controller;
use common\models\Skand;
use yii\web\UploadedFile;
use yii\widgets\ActiveForm;

class SkandController extends Controller
{
    public function actionUpload()
    {
/*        var_dump($model);
        exit;*/
        $model = new Skand();
        $allFiles = FileHelper::findDirectories('uploads/', ['recursive' => false]);
        if (Yii::$app->request->isPost) { // pressed the button
            $post = Yii::$app->request->post();
            if ($model->upload($allFiles, $post)) {
                // file is uploaded successfully
                return $this->render('sucess');
            }
        }
        return $this->render('upload', ['model' => $model]);
    }
}