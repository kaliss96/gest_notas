<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AsignaturasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="asignaturas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($modelAsig, 'id_asig') ?>

    <?= $form->field($modelAsig, 'cod_asig') ?>

    <?= $form->field($modelAsig, 'nombre_asig') ?>

    <?= $form->field($modelAsig, 'total_horas_asig') ?>

    <?= $form->field($modelAsig, 'creditos_asig') ?>

    <?php // echo $form->field($model, 'especificacion_asig') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
