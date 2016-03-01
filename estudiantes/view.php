<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $modelEst app\models\Estudiantes */
/* @var $modelFam app\models\InformacionFamiliar */
/* @var $modelSem app\models\InformacionSeminarista */

$nombreEst = $modelEst->estudiantes;

$this->title = $nombreEst;
$this->params['breadcrumbs'][] = ['label' => 'Estudiantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estudiantes-view">
    <h1  class="title-form" align="center"><?= Html::encode($this->title) ?></h1>
    <hr>
    <fieldset>
      <div class="imagen">
        <div class="row">
          <div class="col-lg-6 col-lg-offset-3">
            <div class="formularios">
              <?= DetailView::widget([
                  'model' => $modelEst,
                  'attributes' => [
                      //'id_est',
                      'num_carnet_est',
                      'nombres_est',
                      'apellidos_est',
                      'fecha_nac_est',
                      'lugar_nac_est',
                      'telefono_est',
                      'direccion_dom_est',
                      'cedula_est',
                  ],
              ]) ?>
              <?= GridView::widget([
                  'dataProvider' => $dataProviderPar,
                  //'filterModel' => $searchModel,
                  'columns' => [
                      //'id_pariente',
                      //'id_est',
                      'nombre_pariente',
                      ['attribute'=>'id_parentesco',
                      'value'=>'idParentesco.nombre_parentesco'],
                      ['attribute'=>'id_profesion',
                      'value'=>'idProfesion.nombre_profesion'],
                  ],
              ]); ?>
              <?= DetailView::widget([
                  'model' => $modelFam,
                  'attributes' => [
                      //'id_info_fami',
                      //'id_est',
                      'cant_hermanas_est',
                      'cant_hermanos_est',
                  ],
              ]) ?>
              <?= GridView::widget([
                  'dataProvider' => $dataProviderAcad,
                  //'filterModel' => $searchModel,
                  'columns' => [
                      //'id_estudio',
                      //'id_est',
                      'lugar_estudio',
                      ['attribute'=>'id_tipo_estudio',
                      'value'=>'idTipoEstudio.nombre_tipo_estudio'],
                  ],
              ]); ?>
              <?= DetailView::widget([
                  'model' => $modelSem,
                  'attributes' => [
                      //'id_info_semi',
                      //'id_est',
                      ['label'=>'Parroquia',
                      'value'=>$modelSem->idParroquia->nombre_parroquia],
                      'fecha_ingreso_est',
                      'observaciones',
                  ],
              ]) ?>

              <p align="right">
                  <?= Html::a('Actualizar', ['update', 'id' => $modelEst->id_est], ['class' => 'btn btn-primary']) ?>
                  <?= Html::a('Eliminar', ['delete', 'id' => $modelEst->id_est], [
                      'class' => 'btn btn-danger',
                      'data' => [
                          'confirm' => '¿Está seguro de eliminar este Estudiante?',
                          'method' => 'post',
                      ],
                  ]) ?>
              </p>
            </div>
          </div>
        </div>
      </div>
    </fieldset>
</div>
