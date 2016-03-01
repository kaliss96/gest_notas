<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Docentes */
$nombreDoc = $model->docentes;

$this->title = 'Actualizar Docente: ' . ' ' . $nombreDoc;
$this->params['breadcrumbs'][] = ['label' => 'Docentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $nombreDoc, 'url' => ['view', 'id' => $model->id_doc]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="docentes-update">

    <h1  class="title-form" align="center"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
