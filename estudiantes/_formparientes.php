<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Parentesco;
use app\models\Profesiones;

/* @var $this yii\web\View */
/* @var $model app\models\Parientes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="parientes-form">
    <?php $form = ActiveForm::begin(); ?>
	<hr>
	<fieldset>
		<div class="imagen">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="formularios">
						<div class="col-lg-12">
							<?= $form->field($modelPar, 'nombre_pariente')->textInput(['maxlength' => 50]) ?>
						</div>
						<div class="col-lg-6">
							<?= $form->field($modelPar, 'id_parentesco')->dropDownList(
	                        ArrayHelper::map(Parentesco::find()->all(),
	                        'id_parentesco',
	                        'nombre_parentesco'))?>
						</div>
						<div class="col-lg-6">
							<?= $form->field($modelPar, 'id_profesion')->dropDownList(
	                        ArrayHelper::map(Profesiones::find()->all(),
	                        'id_profesion',
	                        'nombre_profesion'))?>
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
