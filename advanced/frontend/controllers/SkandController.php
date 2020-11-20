<?php
namespace frontend\controllers;

use Yii;
use yii\helpers\FileHelper;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\widgets\ActiveForm;
use common\models\UploadForm;
use common\models\Orkdata;

class SkandController extends Controller
{
    public function actionIndex()
    {
        $allFiles = FileHelper::findDirectories('./uploads', ['recursive' => false]);
        return $this->render('index', ['allFiles' => $allFiles]);
    }
    public function actionSelect($id)
    {
        $instrModel = new Orkdata();
        $instruments = $instrModel->getUsersInstruments(Yii::$app->user->id);
        $diro = './uploads/'.$id.'/';
        //$allFiles2 = FileHelper::findDirectories($diro . '/', ['recursive' => false]);
        $masive = array();
        foreach ($instruments as $i)
        {
            $temp = $diro.$i.'/';
            array_push($masive, $temp);
        }
        $files = array();
        foreach ($masive as $m)
        {
            array_push($files, \yii\helpers\FileHelper::findFiles($m));
        }
        return $this->render('download', ['allInstruments' => $instruments, 'locations' => $files, 'skand' => $id]);
    }
/*    public function actionData()
    {
        $instrModel = new Orkdata();
        $y = Yii::$app->request->post();
        $ending = $instrModel->getUsersInstruments(Yii::$app->user->id);
        $rez = (int)$y["namo"];
        $end = $ending[$rez];
        $diro = $y["dire"].$end;

        $files=\yii\helpers\FileHelper::findFiles($diro);
        //var_dump($diro);
        //exit();
        $diro = $diro . '/';
        return $this->render('download', ['allFiles' => $files, 'selected' => $diro]);
    }*/
    public function actionDownload($id)
    {
        $id = "./uploads/".$id;

        if (file_exists($id)) {
        return Yii::$app->response->sendFile($id);
        } else {
            var_dump("Neizdevās faila lejupielāde");
            exit();
        }
    }
}