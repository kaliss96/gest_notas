<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Calificaciones */

$this->title = 'Actualizar Calificaciones: ' . ' ' . $model->id_est;
$this->params['breadcrumbs'][] = ['label' => 'Calificaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_est, 'url' => ['view', 'id_matricula' => $model->id_matricula, 'id_est' => $model->id_est, 'id_grupo' => $model->id_grupo]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="calificaciones-update">

    <h1  class="title-form" align="center"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
