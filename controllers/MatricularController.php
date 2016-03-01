<?php

namespace app\controllers;

use Yii;
use app\models\Matriculas;
use app\models\MatriculasSearch;

use app\models\Estudiantes;

use app\models\Calificaciones;
use app\models\CalificacionesSearch;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MatriculasController implements the CRUD actions for Matriculas model.
 */
class MatricularController extends Controller
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
     * Lists all Matriculas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $modelEst = new Calificaciones();

        if ($modelEst->load(Yii::$app->request->post())) {
            $model = Estudiantes::findOne($modelEst->id_est);
            $nombre = $model->estudiantes;
            return $this->redirect(['periodos', 'id' => $modelEst->id_est, 'nombre'=>$nombre]);
        } else {
            return $this->render('index', [
                'modelEst' => $modelEst,
            ]);
        }
    }
    public function actionPeriodosest($id)
    {
        $searchModelPer = new CalificacionesSearch;
        $dataProviderPer = $searchModelPer->search($id);

        return $this->render('indexper', [
            'searchModelPer' => $searchModelPer,
            'dataProviderPer' => $dataProviderPer,
        ]);
    }
    public function actionPeriodos($id, $nombre)
    {
        $modelEst = new Calificaciones();

        if ($modelEst->load(Yii::$app->request->post())) {
            $periodo = $modelEst->id_matricula;
            return $this->redirect(['create', 'id' => $id, 'nombre'=>$nombre, 'periodo'=>$periodo]);
        } else {
            return $this->render('periodos', [
                'modelEst' => $modelEst,
                'NOMBRE'=> $nombre,
            ]);
        }
    }

    /**
     * Displays a single Matriculas model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Matriculas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id,$nombre,$periodo)
    {
        $modelCal = new Calificaciones();
        $modelCal->id_est = $id;
        $modelCal->id_matricula = $periodo;
        $modelCal->nota_final = 0;

        $codMatri = $this->findModel($periodo)->cod_matricula;

        $searchModelCal = new CalificacionesSearch();
        $dataProviderCal = $searchModelCal->searchpormatri($id,$periodo);

        if ($modelCal->load(Yii::$app->request->post()) && $modelCal->save()) {
            return $this->redirect(['create', 'id' => $id, 'nombre'=>$nombre, 'periodo'=>$periodo]);
        } else {
            return $this->render('create', [
                'modelCal' => $modelCal,
                'dataProviderCal' => $dataProviderCal,
                'NOMBRE' => $nombre,
                'MATRI' => $codMatri,
            ]);
        }
    }

    /**
     * Updates an existing Matriculas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_matricula]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Matriculas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Matriculas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Matriculas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Matriculas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
