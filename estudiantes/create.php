<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $modelEst app\models\Estudiantes */
/* @var $modelFam app\models\InformacionFamiliar */
/* @var $modelSem app\models\InformacionSeminarista */

$this->title = 'Creación de Estudiantes';
$this->params['breadcrumbs'][] = ['label' => 'Estudiantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estudiantes-create">

    <h1  class="title-form" align="center"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'modelEst' => $modelEst,
        'modelFam' => $modelFam,
        'modelSem' => $modelSem,
    ]) ?>

</div>
