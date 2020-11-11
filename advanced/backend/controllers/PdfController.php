<?php
namespace backend\controllers;

use Yii;
use yii\helpers\FileHelper;
use yii\helpers\Url;
use yii\web\Controller;
use common\models\UploadForm;
use common\models\Instruments;
use yii\web\UploadedFile;
use yii\widgets\ActiveForm;
use function Sodium\add;

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
            //var_dump($selectedValue, $allFiles);
            $diro = $model->dirfind($selectedValue, $allFiles);
        }
        $allFiles2 = FileHelper::findDirectories($diro.'/', ['recursive' => false]);
        return $this->render('/pdf/upload', ['model' => $model, 'allFiles' => $allFiles2, 'prefix' => $diro]);
    }

    public function actionDeleto()
    {
        $model = new UploadForm();
        $diro = null;
        if(Yii::$app->request->isPost) {
            $y = Yii::$app->request->post();
            $allFiles = FileHelper::findDirectories('uploads/', ['recursive' => false]);
            $selectedValue = $y["namoDel"];
            $diro = $model->dirfind($selectedValue, $allFiles);
        }
                /*var_dump("aaa");
                exit();*/
        $allFiles2 = FileHelper::findDirectories($diro.'/', ['recursive' => false]);
        return $this->render('/pdf/deleto', ['model' => $model, 'allFiles' => $allFiles2, 'prefix' => $diro]);
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

        $into = str_replace($fullDir, "", $diro);
        $temp = str_replace('uploads/', "", $diro);
        $into2 = str_replace("/".$into, "", $temp);
        //var_dump($into);
        //var_dump($into2);
        $instro = new Instruments();

        $skandID = $instro->getSkandIDByName($into2);
        $InstrID = $instro->getInstrID($skandID, $into);
        $instro->Notis($model->pdfFile, $InstrID, $skandID); // MAKE ARRAY

        $allFiles2 = FileHelper::findDirectories('uploads/', ['recursive' => false]);
        $again = $model->dirfindOrder($fullDir, $allFiles2);

        if ($model->upload($diro)) {
            // file is uploaded successfully
            Yii::$app->session->setFlash('success', 'Notis tika pievienotas.');
            return $this->render('/pdf/beigas', ['namo' => $again]);
        }
    }
    public function actionFinald()
    {
        $model = new UploadForm();
        $y = Yii::$app->request->post();
        $dir = $y['namoDel'];
        $fullDir = $y['dire'];
        $allFiles = FileHelper::findDirectories($fullDir, ['recursive' => false]);
        $diro = $model->dirfind($dir, $allFiles);

        $into = str_replace($fullDir, "", $diro);
        $temp = str_replace('uploads/', "", $diro);
        $into2 = str_replace("/".$into, "", $temp);

        $instro = new Instruments();

        $skandID = $instro->getSkandIDByName($into2);
        $InstrID = $instro->getInstrID($skandID, $into);
        $instro->NotisD($InstrID, $skandID); // MAKE ARRAY

        //exit();
        //vajag citu
        Yii::$app->session->setFlash('success', 'Notis tika dzēstas.');
        return $this->render('/pdf/beigas', ['namo' => $y['namoDel']]);
    }
}