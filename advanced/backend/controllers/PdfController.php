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
    public function actionUpload()
    {
        $model = new UploadForm();
        $allFiles = FileHelper::findDirectories('uploads/', ['recursive' => false]);
        if (Yii::$app->request->isPost) { // pressed the button
            $post = Yii::$app->request->post();
            $model->pdfFile = UploadedFile::getInstance($model, 'pdfFile');
            if ($model->upload($post["namo"], $allFiles)) {
                // file is uploaded successfully
                return $this->render('sucess');
            }
        }
        return $this->render('upload', ['model' => $model, 'allFiles' => $allFiles]);
    }
}