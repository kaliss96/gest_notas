<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $modelAsig app\models\Asignaturas */
/* @var $modelPlan app\models\PlanDeEstudio */

$this->title = 'Creación de Asignaturas';
$this->params['breadcrumbs'][] = ['label' => 'Asignaturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asignaturas-create">

    <h1  class="title-form" align="center"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'modelAsig' => $modelAsig,
        'modelPlan' => $modelPlan,
    ]) ?>

</div>
