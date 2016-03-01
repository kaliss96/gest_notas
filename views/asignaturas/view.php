<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Asignaturas */
/* @var $model app\models\PlanDeEstudio */

$this->title = $modelAsig->nombre_asig;
$this->params['breadcrumbs'][] = ['label' => 'Asignaturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asignaturas-view">
    <h1  class="title-form" align="center"><?= Html::encode($this->title) ?></h1>
    <hr>
    <fieldset>
      <div class="imagen">
        <div class="row">
          <div class="col-lg-6 col-lg-offset-3">
            <div class="formularios">
              <?= DetailView::widget([
                  'model' => $modelAsig,
                  'attributes' => [
                      //'id_asig',
                      'cod_asig',
                      'nombre_asig',
                      'total_horas_asig',
                      'creditos_asig',
                      'especificacion_asig',
                  ],
              ]) ?>
              <?= DetailView::widget([
                  'model' => $modelPlan,
                  'attributes' => [
                      //'id_plan',
                      //'id_asig',
                      ['label'=>'Facultad',
                      'value'=>$modelPlan->idFacultad->nombre_facultad],
                      'curso',
                      'semestre',
                  ],
              ]) ?>
              <?= GridView::widget([
                  'dataProvider' => $dataProviderPre,
                  //'filterModel' => $searchModel,
                  'columns' => [
                      //['class' => 'yii\grid\SerialColumn'],
                      //'id_prerrequisito',
                      ['attribute'=>'id_asig',
                      'value'=>'idAsig.nombre_asig'],
                      //'prerrequisito',
                      'tipo_prerrequisito:boolean',
                  ],
              ]); ?>

              <p align="right">
                  <?= Html::a('Actualizar', ['update', 'id' => $modelAsig->id_asig], ['class' => 'btn btn-primary']) ?>
                  <?= Html::a('Eliminar', ['delete', 'id' => $modelAsig->id_asig], [
                      'class' => 'btn btn-danger',
                      'data' => [
                          'confirm' => '¿Está seguro de eliminar esta Asignatura?',
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
