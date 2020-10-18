<?php
namespace frontend\controllers;

use Yii;
use yii\helpers\FileHelper;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\widgets\ActiveForm;

class SkandController extends Controller
{
    public function actionSkand()
    {
        $allFiles = FileHelper::findDirectories('./uploads/uploads', ['recursive' => true]);
        var_dump($allFiles);
        exit;
        foreach ($allFiles as $al)
        {

        }
        //$allFiles =true;
        return $this->render('skand', ['direct' => $allFiles]);
    }
}