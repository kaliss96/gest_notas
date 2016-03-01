<?php

namespace app\controllers;

use Yii;
use app\models\Calificaciones;
use app\models\CalificacionesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CalificacionesController implements the CRUD actions for Calificaciones model.
 */
class CalificacionesController extends Controller
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
     * Lists all Calificaciones models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CalificacionesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Calificaciones model.
     * @param integer $id_matricula
     * @param integer $id_est
     * @param integer $id_grupo
     * @return mixed
     */
    public function actionView($id_matricula, $id_est, $id_grupo)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_matricula, $id_est, $id_grupo),
        ]);
    }

    /**
     * Creates a new Calificaciones model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Calificaciones();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_matricula' => $model->id_matricula, 'id_est' => $model->id_est, 'id_grupo' => $model->id_grupo]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Calificaciones model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_matricula
     * @param integer $id_est
     * @param integer $id_grupo
     * @return mixed
     */
    public function actionUpdate($id_matricula, $id_est, $id_grupo)
    {
        $model = $this->findModel($id_matricula, $id_est, $id_grupo);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_matricula' => $model->id_matricula, 'id_est' => $model->id_est, 'id_grupo' => $model->id_grupo]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Calificaciones model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_matricula
     * @param integer $id_est
     * @param integer $id_grupo
     * @return mixed
     */
    public function actionDelete($id_matricula, $id_est, $id_grupo)
    {
        $this->findModel($id_matricula, $id_est, $id_grupo)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Calificaciones model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_matricula
     * @param integer $id_est
     * @param integer $id_grupo
     * @return Calificaciones the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_matricula, $id_est, $id_grupo)
    {
        if (($model = Calificaciones::findOne(['id_matricula' => $id_matricula, 'id_est' => $id_est, 'id_grupo' => $id_grupo])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
