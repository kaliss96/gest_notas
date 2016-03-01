<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $modelEst app\models\Estudiantes */
/* @var $modelFam app\models\InformacionFamiliar */
/* @var $modelSem app\models\InformacionSeminarista */

$nombreEst = $modelEst->estudiantes;

$this->title = 'Actualizar Estudiante: ' . ' ' . $nombreEst;
$this->params['breadcrumbs'][] = ['label' => 'Estudiantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $nombreEst, 'url' => ['view', 'id' => $modelEst->id_est]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="estudiantes-update">

    <h1  class="title-form" align="center"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'modelEst' => $modelEst,
        'modelFam' => $modelFam,
        'modelSem' => $modelSem,
    ]) ?>

</div>
