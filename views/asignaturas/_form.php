<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Facultades;

/* @var $this yii\web\View */
/* @var $model app\models\Asignaturas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="asignaturas-form">
    <?php $form = ActiveForm::begin(); ?>
    <hr>
    <fieldset>
      <div class="imagen">
        <div class="row">
		      <div class="col-lg-8 col-lg-offset-2">
		        <div class="formularios">
              <div class="row">
                <div class="col-lg-12">
                  <div class="col-lg-6">
                    <?= $form->field($modelAsig, 'cod_asig')->textInput(['maxlength' => 8]) ?>
                  </div>
                  <div class="col-lg-6">
                    <?= $form->field($modelAsig, 'nombre_asig')->textInput(['maxlength' => 80]) ?>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="col-lg-3">
                    <?= $form->field($modelAsig, 'total_horas_asig')->textInput() ?>
                  </div>
                  <div class="col-lg-3">
                    <?= $form->field($modelAsig, 'creditos_asig')->textInput() ?>
                  </div>
                  <div class="col-lg-6">
                    <br>
                    <?= $form->field($modelAsig, 'especificacion_asig')->textInput(['maxlength' => 50]) ?>
                  </div>  
                </div>

                <div class="col-lg-12">
                  <hr>
                  <h3>Plan de Estudio</h3>
                  <div class="col-lg-6">
                    <?= $form->field($modelPlan, 'id_facultad')->dropDownList(
                      ArrayHelper::map(Facultades::find()->all(),
                      'id_facultad',
                      'nombre_facultad'))?>
                  </div>
                  <div class="col-lg-3">
                    <?= $form->field($modelPlan, 'curso')->textInput() ?>
                  </div>
                  <div class="col-lg-3">
                    <?= $form->field($modelPlan, 'semestre')->textInput() ?>
                  </div>
                </div>
              </div>
            
              <div class="form-group" align="right">
                <?= Html::submitButton('Siguiente', ['class' => $modelAsig->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
              </div>
		        </div>
          </div>
        </div>
      </div>
    </fieldset>
    <?php ActiveForm::end(); ?>
</div>
