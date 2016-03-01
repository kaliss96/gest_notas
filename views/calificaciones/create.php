<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Calificaciones */

$this->title = 'Creación de Calificaciones';
$this->params['breadcrumbs'][] = ['label' => 'Calificaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="calificaciones-create">

    <h1  class="title-form" align="center"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
