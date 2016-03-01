<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Asignaturas */
/* @var $model app\models\PlanDeEstudio */


$this->title = 'Actualizar Asignatura: ' . ' ' . $modelAsig->nombre_asig;
$this->params['breadcrumbs'][] = ['label' => 'Asignaturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $modelAsig->nombre_asig, 'url' => ['view', 'id' => $modelAsig->id_asig]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="asignaturas-update">

    <h1  class="title-form" align="center"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'modelAsig' => $modelAsig,
        'modelPlan' => $modelPlan,
    ]) ?>

</div>
