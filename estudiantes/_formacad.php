<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\TiposDeEstudio;

/* @var $this yii\web\View */
/* @var $model app\models\FormacionAcademica */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="formacion-academica-form">
    <?php $form = ActiveForm::begin(); ?>
	<hr>
	<fieldset>
		<div class="imagen">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="formularios">
						<div class="col-lg-12">
							<?= $form->field($modelAcad, 'lugar_estudio')->textInput(['maxlength' => 50]) ?>
						</div>
						<div class="col-lg-12">
							<?= $form->field($modelAcad, 'id_tipo_estudio')->dropDownList(
	                        ArrayHelper::map(TiposDeEstudio::find()->all(),
	                        'id_tipo_estudio',
	                        'nombre_tipo_estudio'))?>
						</div>
						<div class="form-group" align="right">
					        <?= Html::submitButton('Crear', ['class' => 'btn btn-success']) ?>
					    </div>
					</div>
				</div>
			</div>
		</div>
	</fieldset>
    <?php ActiveForm::end(); ?>
</div>
