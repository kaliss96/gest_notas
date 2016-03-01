<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use dosamigos\datetimepicker\DateTimePicker;
use yii\helpers\ArrayHelper;
use app\models\Parroquias;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $model app\models\Estudiantes */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="estudiantes-form">
    <?php $form = ActiveForm::begin(); ?>
    <hr>
    <fieldset>
      <div class="imagen">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <div class="formularios">
              
              <ul class="nav nav-tabs" data-tabs="tabs">
                <li class="active"><a href="#personal" data-toggle="tab">Información Personal</a></li>
                <li><a href="#familiar" data-toggle="tab">Información Familiar</a></li>
                <li><a href="#seminarista" data-toggle="tab">Información del Seminarista</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="personal">
                  <hr>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="col-lg-6"><?= $form->field($modelEst, 'nombres_est')->textInput(['maxlength' => 50]) ?></div>
                      <div class="col-lg-6"><?= $form->field($modelEst, 'apellidos_est')->textInput(['maxlength' => 50]) ?></div>
                    </div>
                    <div class="col-lg-12">
                      <div class="col-lg-6"><?= $form->field($modelEst, 'num_carnet_est')->textInput(['maxlength' => 50]) ?></div>
                      <div class="col-lg-6"><?= $form->field($modelEst, 'cedula_est')->widget(\yii\widgets\MaskedInput::classname(), [
                      'mask' => '999-999999-9999a',
                  ]) ?></div>
                    </div>
                    <div class="col-lg-12">
                      <div class="col-lg-6"><?= $form->field($modelEst, 'fecha_nac_est')->widget(
                              DatePicker::className(), [
                               'inline' => false,
                               'clientOptions' => [
                                  'autoclose' => true,
                                  'format' => 'dd-M-yyyy'
                              ]
                      ]);?></div>
                      <div class="col-lg-6"><?= $form->field($modelEst, 'lugar_nac_est')->textInput(['maxlength' => 50]) ?></div>
                    </div>
                    <div class="col-lg-12">
                      <div class="col-lg-6"><?= $form->field($modelEst, 'telefono_est')->widget(\yii\widgets\MaskedInput::classname(), [
                      'mask' => '9999-9999',
                  ]) ?></div>
                    </div>
                    <div class="col-lg-12">
                      <div class="col-lg-12"><?= $form->field($modelEst, 'direccion_dom_est')->textInput(['maxlength' => 100]) ?></div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="familiar">
                  <hr>
                  <div class="row">
                    <div class="col-lg-6">
                      <?= $form->field($modelFam, 'cant_hermanas_est')->textInput() ?>
                    </div>
                    <div class="col-lg-6">
                      <?= $form->field($modelFam, 'cant_hermanos_est')->textInput() ?>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="seminarista">
                  <hr>
                  <div class="row"> 
                    <div class="col-lg-6">
                      <?= $form->field($modelSem, 'id_parroquia')->dropDownList(
                        ArrayHelper::map(Parroquias::find()->all(),
                        'id_parroquia',
                        'nombre_parroquia'))?>
                    </div>
                    <div class="col-lg-6">
                      <?= $form->field($modelSem, 'fecha_ingreso_est')->widget(
                                  DatePicker::className(), [
                                   'inline' => false,
                                   'clientOptions' => [
                                    'autoclose' => true,
                                    'format' => 'dd-M-yyyy']
                      ]);?>
                    </div>
                    <div class="col-lg-12">
                      <?= $form->field($modelSem, 'observaciones')->textInput(['maxlength' => 100]) ?>
                    </div>
                  </div>
                  <div class="form-group" align="right">
                      <?= Html::submitButton('Siguiente', ['class' => $modelEst->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
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
