<?php
namespace backend\controllers;

use Yii;
use yii\helpers\FileHelper;
use yii\helpers\Url;
use yii\web\Controller;
use common\models\UploadForm;
use yii\web\UploadedFile;
use yii\widgets\ActiveForm;

class PdfController extends Controller
{
    public function actionSucess()
    {
        $allFiles = FileHelper::findDirectories('uploads/', ['recursive' => false]);
        return $this->render('sucess', ['allFiles' => $allFiles]);
    }

    public function actionUpload()
    {
        $model = new UploadForm();
        $diro = null;
        if(Yii::$app->request->isPost) {
            $y = Yii::$app->request->post();
            $allFiles = FileHelper::findDirectories('uploads/', ['recursive' => false]);
            $selectedValue = $y["namo"];
            $diro = $model->dirfind($selectedValue, $allFiles);
        }
/*        var_dump("aaa");
        exit();*/
        $allFiles2 = FileHelper::findDirectories($diro.'/', ['recursive' => false]);
        return $this->render('/pdf/upload', ['model' => $model, 'allFiles' => $allFiles2, 'prefix' => $diro]);
    }

    public function actionFinal()
    {
        $model = new UploadForm();
        if(Yii::$app->request->isPost) {
            $y = Yii::$app->request->post();
        }
        $dir = $y['namo'];
        $fullDir = $y['dire'];
        $allFiles = FileHelper::findDirectories($fullDir, ['recursive' => false]);
        $diro = $model->dirfind($dir, $allFiles);
        $model->pdfFile = UploadedFile::getInstances($model, 'pdfFile');
        if ($model->upload($diro)) {
            // file is uploaded successfully
            Yii::$app->session->setFlash('success', 'Notis tika pievienotas.');
            return $this->render('/pdf/beigas', ['namo' => $y['namo']]);
        }
    }
}