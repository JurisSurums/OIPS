<?php
namespace backend\controllers;

use Yii;
use yii\helpers\FileHelper;
use yii\web\Controller;
use common\models\Skand;
use common\models\Skandarbi;
use common\models\Instruments;
use common\models\UploadForm;
use yii\widgets\ActiveForm;

class SkandController extends Controller
{
    public function actionUpload()
    {
        $model = new Skand();
        return $this->render('upload', ['model' => $model]);
    }
    public function actionFinal()
    {
        $model = new Skand();
        $allFiles = FileHelper::findDirectories('uploads/', ['recursive' => false]);
        if (Yii::$app->request->isPost) { // pressed the button
            $post = Yii::$app->request->post();
            $skandarbs = new Skandarbi();
            $namo = $post["Skand"]["name_field"];
            $descriptio = $post["Skand"]["description"];
            $currDate = date('Y-m-d');
            if ($model->upload($allFiles, $post)) {
                $skandarbs->title = $namo;
                $skandarbs->description = $descriptio;
                $skandarbs->create_date = $currDate;
                $skandarbs->save();
                $skandarbs->createInst($skandarbs->id);
                return $this->render('sucess');
            }
            else
            {
                Yii::$app->session->setFlash('error', 'Eksistē skaņdarbs ar šādu nosaukumu.');
                return $this->render('upload', ['model' => $model]);
            }
        }
    }
}