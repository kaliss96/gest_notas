<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EstudiantesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estudiantes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_est') ?>

    <?= $form->field($model, 'num_carnet_est') ?>

    <?= $form->field($model, 'nombres_est') ?>

    <?= $form->field($model, 'apellidos_est') ?>

    <?= $form->field($model, 'fecha_nac_est') ?>

    <?php // echo $form->field($model, 'lugar_nac_est') ?>

    <?php // echo $form->field($model, 'telefono_est') ?>

    <?php // echo $form->field($model, 'direccion_dom_est') ?>

    <?php // echo $form->field($model, 'cedula_est') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
