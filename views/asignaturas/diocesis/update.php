<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Diocesis */

$this->title = 'Actualizar Diócesis: ' . ' ' . $model->nombre_diocesis;
$this->params['breadcrumbs'][] = ['label' => 'Diócesis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombre_diocesis, 'url' => ['view', 'id' => $model->id_diocesis]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="diocesis-update">

    <h1  class="title-form" align="center"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
