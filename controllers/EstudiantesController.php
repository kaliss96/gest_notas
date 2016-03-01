<?php

namespace app\controllers;

use Yii;
use app\models\Estudiantes;
use app\models\EstudiantesSearch;
use app\models\InformacionFamiliar;
use app\models\InformacionFamiliarSearch;
use app\models\InformacionSeminarista;
use app\models\InformacionSeminaristaSearch;

use app\models\Parientes;
use app\models\ParientesSearch;
use app\models\FormacionAcademica;
use app\models\FormacionAcademicaSearch;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EstudiantesController implements the CRUD actions for Estudiantes model.
 */
class EstudiantesController extends Controller
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
     * Lists all Estudiantes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModelEst = new EstudiantesSearch();
        $dataProviderEst = $searchModelEst->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModelEst' => $searchModelEst,
            'dataProviderEst' => $dataProviderEst,
        ]);
    }
    public function actionIndexparientes($id,$nombre)
    {
        $searchModelPar = new ParientesSearch();
        $dataProviderPar = $searchModelPar->search($id);

        return $this->render('indexparientes', [
            'dataProviderPar' => $dataProviderPar,
            'IDEST' => $id,
            'NOMBRE' => $nombre,
        ]);

    }
    public function actionIndexacad($id,$nombre)
    {
        $searchModelAcad = new FormacionAcademicaSearch();
        $dataProviderAcad = $searchModelAcad->search($id);

        return $this->render('indexacad', [
            'dataProviderAcad' => $dataProviderAcad,
            'IDEST' => $id,
            'NOMBRE' => $nombre,
        ]);
    }
    /**
     * Displays a single Estudiantes model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $searchModelPar = new ParientesSearch();
        $dataProviderPar = $searchModelPar->search($id);
        $searchModelAcad = new FormacionAcademicaSearch();
        $dataProviderAcad = $searchModelAcad->search($id);

        return $this->render('view', [
            'modelEst' => $this->findModelEst($id),
            'modelFam' => $this->findModelFam($id),
            'modelSem' => $this->findModelSem($id),
            'dataProviderPar' => $dataProviderPar,
            'dataProviderAcad' => $dataProviderAcad,
        ]);
    }

    /**
     * Creates a new Estudiantes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $modelEst = new Estudiantes();
        $modelFam = new InformacionFamiliar();
        $modelSem = new InformacionSeminarista();
		
        if ($modelEst->load(Yii::$app->request->post()) && $modelEst->save()) {
            $modelFam->id_est = $modelEst->id_est;
            if ($modelFam->load(Yii::$app->request->post()) && $modelFam->save()) {
                $modelSem->id_est = $modelEst->id_est;
                if ($modelSem->load(Yii::$app->request->post()) && $modelSem->save()) {
                    return $this->redirect(['indexparientes', 'id' => $modelEst->id_est, 'nombre' =>$modelEst->estudiantes]);
                } else{
                    $this->deleteFam($modelFam->id_est);
                    $this->deleteEst($modelEst->id_est);
                    return $this->render('create', [
                        'modelEst' => $modelEst,
                        'modelFam' => $modelFam,
                        'modelSem' => $modelSem,
                    ]);
                }
            } else{
                $this->deleteEst($modelEst->id_est);
                return $this->render('create', [
                    'modelEst' => $modelEst,
                    'modelFam' => $modelFam,
                    'modelSem' => $modelSem,
                ]);
            }
        } else {
            return $this->render('create', [
                'modelEst' => $modelEst,
                'modelFam' => $modelFam,
                'modelSem' => $modelSem,
            ]);
        }
    }
    public function actionCreatepariente($id,$nombre)
    {
        $modelPar = new Parientes();
        $modelPar->id_est = $id;
        if ($modelPar->load(Yii::$app->request->post()) && $modelPar->save()) {
            return $this->redirect(['indexparientes', 'id' => $id, 'nombre' => $nombre]);
        } else {
            return $this->render('createparientes', [
                'modelPar' => $modelPar,
                'NOMBRE' => $nombre,
            ]);
        }
    }
    public function actionCreateacad($id,$nombre)
    {
        $modelAcad = new FormacionAcademica();
        $modelAcad->id_est = $id;
        if ($modelAcad->load(Yii::$app->request->post()) && $modelAcad->save()) {
            return $this->redirect(['indexacad', 'id' => $id, 'nombre' => $nombre]);
        } else {
            return $this->render('createacad', [
                'modelAcad' => $modelAcad,
                'NOMBRE' => $nombre,
            ]);
        }
    }

    /**
     * Updates an existing Estudiantes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $modelEst = $this->findModelEst($id);
        $modelFam = $this->findModelFam($id);
        $modelSem = $this->findModelSem($id);

        if ($modelEst->load(Yii::$app->request->post()) && $modelFam->load(Yii::$app->request->post()) && $modelSem->load(Yii::$app->request->post()) &&
            $modelEst->save() && $modelFam->save() && $modelSem->save() ) {
            return $this->redirect(['indexparientes', 'id' => $modelEst->id_est, 'nombre' =>$modelEst->estudiantes]);
        } else {
            return $this->render('update', [
                'modelEst' => $modelEst,
                'modelFam' => $modelFam,
                'modelSem' => $modelSem,
            ]);
        }
    }

    /**
     * Deletes an existing Estudiantes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->deleteparientes($id);
        $this->deleteacad($id);

        $this->findModelFam($id)->delete();
        $this->findModelSem($id)->delete();
        $this->findModelEst($id)->delete();

        return $this->redirect(['index']);
    }
    protected function deleteEst($id)
    {
        $this->findModelEst($id)->delete();
    }
    protected function deleteFam($id)
    {
        $this->findModelFam($id)->delete();
    }
    public function actionDeletedetalle($id)
    {
        $modelPar = Parientes::findOne($id);
        $idEst = $modelPar->id_est;
        $nombre = $this->findModelEst($idEst)->estudiantes;
        $modelPar->delete();
        return $this->redirect(['indexparientes', 'id'=>$idEst, 'nombre'=>$nombre]);
    }
    public function actionDeletedetalle2($id)
    {
        $modelAcad = FormacionAcademica::findOne($id);
        $idEst = $modelAcad->id_est;
        $nombre = $this->findModelEst($idEst)->estudiantes;
        $modelAcad->delete();
        return $this->redirect(['indexacad', 'id'=>$idEst, 'nombre'=>$nombre]);
    }

    /**
     * Finds the Estudiantes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Estudiantes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelEst($id)
    {
        if (($modelEst = Estudiantes::findOne($id)) !== null) {
            return $modelEst;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    protected function findModelFam($id)
    {
        if (($modelFam = InformacionFamiliar::findOne(['id_est'=>$id])) !== null) {
            return $modelFam;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    protected function findModelSem($id)
    {
        if (($modelSem = InformacionSeminarista::findOne(['id_est'=>$id])) !== null) {
            return $modelSem;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    protected function deleteparientes($id)
    {
        if ((Parientes::find()->where(['id_est'=>$id])->count()) !== 0){
            Parientes::deleteAll(['id_est'=>$id]);
        }
    }
    protected function deleteacad($id)
    {
        if ((FormacionAcademica::find()->where(['id_est'=>$id])->count()) !== 0){
            FormacionAcademica::deleteAll(['id_est'=>$id]);
        }
    }
}
