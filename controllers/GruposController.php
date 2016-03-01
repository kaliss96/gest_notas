<?php

namespace app\controllers;

use Yii;

use app\models\Grupos;
use app\models\GruposSearch;
use app\models\Horarios;
use app\models\HorariosSearch;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GruposController implements the CRUD actions for Grupos model.
 */
class GruposController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Grupos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModelGru = new GruposSearch();
        $dataProviderGru = $searchModelGru->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModelGru' => $searchModelGru,
            'dataProviderGru' => $dataProviderGru,
        ]);
    }
    public function actionIndexhorario($id,$cod)
    {
        $searchModelHor = new HorariosSearch();
        $dataProviderHor = $searchModelHor->search($id);

        return $this->render('indexhorario', [
            //'searchModelHor' => $searchModelHor,
            'dataProviderHor' => $dataProviderHor,
            'IDGRUPO' => $id,
            'CODGRUPO' => $cod,
        ]);
    }
    /**
     * Displays a single Grupos model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $searchModelHor = new HorariosSearch();
        $dataProviderHor = $searchModelHor->search($id);

        return $this->render('view', [
            'modelGru' => $this->findModelGru($id),
            'dataProviderHor' => $dataProviderHor,
        ]);
    }
    /**
     * Creates a new Grupos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $modelGru = new Grupos();

        if ($modelGru->load(Yii::$app->request->post()) && $modelGru->save()) {
            return $this->redirect(['indexhorario', 'id' => $modelGru->id_grupo, 'cod' =>$modelGru->cod_grupo,]);
        } else {
            return $this->render('create', [
                'modelGru' => $modelGru,
            ]);
        }
    }
    public function actionCreatehorario($id, $cod)
    {
        $modelHor = new Horarios();
        $modelHor->id_grupo = $id;
        if ($modelHor->load(Yii::$app->request->post()) && $modelHor->save()) {
            return $this->redirect(['indexhorario', 'id' => $id, 'cod' => $cod]);
        } else {
            return $this->render('createhorario', [
                'modelHor' => $modelHor,
                'CODGRUPO' => $cod,
            ]);
        }
    }
    /**
     * Updates an existing Grupos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $modelGru = $this->findModelGru($id);

        if ($modelGru->load(Yii::$app->request->post()) && $modelGru->save()) {
            return $this->redirect(['indexhorario', 'id' => $modelGru->id_grupo, 'cod' =>$modelGru->cod_grupo,]);
        } else {
            return $this->render('update', [
                'modelGru' => $modelGru,
            ]);
        }
    }

    /**
     * Deletes an existing Grupos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->deletehorarios($id);
        $this->findModelGru($id)->delete();

        return $this->redirect(['index']);
    }
    public function actionDeletedetalle($id)
    {
        $modelHor = Horarios::findOne($id);
        $idGru = $modelHor->id_grupo;
        $codGru = $this->findModelGru($idGru)->cod_grupo;
        $modelHor->delete();
        return $this->redirect(['indexhorario', 'id' =>$idGru, 'cod'=>$codGru]);
    }
    /**
     * Finds the Grupos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Grupos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelGru($id)
    {
        if (($modelGru = Grupos::findOne($id)) !== null) {
            return $modelGru;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    protected function deletehorarios($id)
    {
        if ((Horarios::find()->where(['id_grupo'=>$id])->count()) !== 0){
            Horarios::deleteAll(['id_grupo'=>$id]);
        }
    }
}
