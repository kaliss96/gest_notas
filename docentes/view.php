<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Docentes */
$nombreDoc = $model->docentes;

$this->title = $nombreDoc;
$this->params['breadcrumbs'][] = ['label' => 'Docentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="docentes-view">
    <h1  class="title-form" align="center"><?= Html::encode($this->title) ?></h1>
    <hr>
    <fieldset>
      <div class="imagen">
        <div class="row">
          <div class="col-lg-6 col-lg-offset-3">
            <div class="formularios">
              <?= DetailView::widget([
                  'model' => $model,
                  'attributes' => [
                      //'id_doc',
                      'num_carnet_doc',
                      'nombres_doc',
                      'apellidos_doc',
                      'cedula_doc',
                      'telefono_doc',
                      'email_doc:email',
                  ],
              ]) ?>
              <p align="right">
                  <?= Html::a('Actualizar', ['update', 'id' => $model->id_doc], ['class' => 'btn btn-primary']) ?>
                  <?= Html::a('Eliminar', ['delete', 'id' => $model->id_doc], [
                      'class' => 'btn btn-danger',
                      'data' => [
                          'confirm' => '¿Está seguro de eliminar este Docente?',
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
