<?php

namespace backend\controllers;

use Yii;
use common\models\Orkdata;
use common\models\User;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrkdataController implements the CRUD actions for Orkdata model.
 */
class OrkdataController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Orkdata models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Orkdata::find(),
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Orkdata model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Orkdata model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Orkdata();
        $users = new User();
        $d = $users->findAllUsernames();
        $items = array("trompetes", "mežragi", "tromboni", "tubas", "vijoles", "alti",
        "čelli", "kontrabasi", "flautas", "obojas", "klarnetes",
        "fagoti", "flautas", "timpāni", "bungas", "šķīvji un zvani"
        );
        if(Yii::$app->request->post())
        {
            $back = Yii::$app->request->post();
            $instrId = $back["Orkdata"]["instrument"];
            /*var_dump($back);
            exit();*/
            $val = (int)$back['Lietotāji'];
            $back["Orkdata"]["instrument"] = $items[$instrId];
            $UserId = $users->findById($val);
            $back["Orkdata"]["user_id"] = (string)$UserId;
            if ($model->load($back) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'names' => $d,
            'items' => $items
        ]);
    }

    /**
     * Updates an existing Orkdata model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $users = new User();
        $model = $this->findModel($id);
        $d = $users->findAllUsernames();
        if(Yii::$app->request->post())
        {
            $back = Yii::$app->request->post();
            //var_dump($back['namo']);
            $val = (int)$back['namo'];
            $UserId = $users->findById($val);
            $back["Orkdata"]["user_id"] = (string)$UserId;

            if ($model->load($back) && $model->save(false)) {

                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        return $this->render('update', [
            'model' => $model,
            'names' => $d
        ]);
    }

    /**
     * Deletes an existing Orkdata model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Orkdata model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Orkdata the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Orkdata::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
