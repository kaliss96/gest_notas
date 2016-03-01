<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Docentes */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="docentes-form">
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
                    <?= $form->field($model, 'nombres_doc')->textInput(['maxlength' => 50]) ?>
                  </div>
                  <div class="col-lg-6">
                    <?= $form->field($model, 'apellidos_doc')->textInput(['maxlength' => 50]) ?>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="col-lg-6">
                    <?= $form->field($model, 'num_carnet_doc')->textInput(['maxlength' => 50]) ?>
                  </div>
                  <div class="col-lg-6">
                    <?= $form->field($model, 'cedula_doc')->widget(\yii\widgets\MaskedInput::classname(), [
                      'mask' => '999-999999-9999a',
                  ]) ?>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="col-lg-6">
                    <?= $form->field($model, 'telefono_doc')->widget(\yii\widgets\MaskedInput::classname(), [
                      'mask' => '9999-9999',
                  ]) ?>
                  </div>
                  <div class="col-lg-6">
                    <?= $form->field($model, 'email_doc')->textInput(['maxlength' => 50]) ?>
                  </div>  
                </div>
                <div class="col-lg-12">
                  <div class="form-group" align="right">
                      <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </fieldset>
    <?php ActiveForm::end(); ?>
</div>
