<?php
namespace backend\controllers;

use Yii;
use yii\helpers\FileHelper;
use yii\web\Controller;
use common\models\UploadForm;
use yii\web\UploadedFile;
use yii\widgets\ActiveForm;

class PdfController extends Controller
{
    public function actionSucess()
    {
        $allFiles = FileHelper::findDirectories('uploads/', ['recursive' => false]);
        if(Yii::$app->request->isPost) { // pressed the button
            $y = Yii::$app->request->post();
            $this->actionUpload($y["namo"]);
        }
        return $this->render('sucess', ['allFiles' => $allFiles]);
    }

    public function actionUpload($namo)
    {
        $model = new UploadForm();
        $allFiles = FileHelper::findDirectories('uploads/', ['recursive' => false]);
        $dirname = $model->dir($namo, $allFiles); //returns selected - svetku uvertire
        $allFiles = FileHelper::findDirectories($dirname, ['recursive' => false]);
/*        var_dump($allFiles);
        exit;*/
        return $this->render('/pdf/upload', ['model' => $model, 'allFiles' => $allFiles]);
/*        $post = Yii::$app->request->post();
        $model->pdfFile = UploadedFile::getInstance($model, 'pdfFile');
        if ($model->upload($namo, $allFiles)) {
            // file is uploaded successfully
            return $this->render('sucess');
        }*/
    }
}