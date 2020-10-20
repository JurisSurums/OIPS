<?php
namespace backend\controllers;

use Yii;
use yii\helpers\FileHelper;
use yii\web\Controller;
use common\models\Skand;
use common\models\UploadForm;
use yii\web\UploadedFile;
use yii\widgets\ActiveForm;

class DelskandController extends Controller
{
    public function actionDelete()
    {
/*        var_dump($model);
        exit;*/
        $model = new UploadForm();
        $allFiles = FileHelper::findDirectories('uploads/', ['recursive' => false]);
        if (Yii::$app->request->isPost) { // pressed the button
            $post = Yii::$app->request->post();
            $diro = $model->dirfind($post["namo"], $allFiles);
            FileHelper::removeDirectory($diro, ['recursive' => true]);
            return $this->render('sucess');
        }
        return $this->render('delete', ['model' => $model, "allFiles" => $allFiles]);
    }
}