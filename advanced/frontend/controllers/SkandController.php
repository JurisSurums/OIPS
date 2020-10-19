<?php
namespace frontend\controllers;

use Yii;
use yii\helpers\FileHelper;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\widgets\ActiveForm;
use common\models\UploadForm;

class SkandController extends Controller
{
    public function actionIndex()
    {
        $allFiles = FileHelper::findDirectories('./uploads', ['recursive' => false]);
        return $this->render('index', ['allFiles' => $allFiles]);
    }
    public function actionSelect()
    {
        $model = new UploadForm();
        if(Yii::$app->request->isPost) {
            $y = Yii::$app->request->post();
        }
        $allFiles1 = FileHelper::findDirectories('./uploads', ['recursive' => false]);
        $diro = $model->dirfind($y ["namo"], $allFiles1).'/';
        $allFiles2 = FileHelper::findDirectories($diro . '/', ['recursive' => false]);
        return $this->render('view', ['allFiles' => $allFiles2, 'selected' => $diro]);
    }
    public function actionData()
    {
        $model = new UploadForm();
        $y = Yii::$app->request->post();
        $allFiles2 = FileHelper::findDirectories($y["dire"], ['recursive' => false]);
        $diro = $model->dirfind($y["namo"], $allFiles2);
        $files=\yii\helpers\FileHelper::findFiles($diro);
        $diro = $diro . '/';
        return $this->render('download', ['allFiles' => $files, 'selected' => $diro]);
    }
    public function actionDownload()
    {
        $y = Yii::$app->request->post();
        $files=\yii\helpers\FileHelper::findFiles($y["dire"]);
        $downloadFile = $files[$y["namo"]];
        var_dump($downloadFile);

        if (file_exists($downloadFile)) {
        return Yii::$app->response->sendFile($downloadFile);
        } else {
            var_dump("rip");
            exit();
        }
    }
}