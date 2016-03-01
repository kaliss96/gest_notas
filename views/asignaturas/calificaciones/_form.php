<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Calificaciones */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="calificaciones-form">
    <?php $form = ActiveForm::begin(); ?>
	<hr>
	<fieldset>
		<div class="imagen">
			<div class="row">
				<div class="col-lg-4 col-lg-offset-4">
					<div class="formularios">
						<?= $form->field($model, 'id_matricula')->textInput() ?>
					    <?= $form->field($model, 'id_est')->textInput() ?>
					    <?= $form->field($model, 'id_grupo')->textInput() ?>
					    <?= $form->field($model, 'nota_final')->textInput() ?>

					    <div class="form-group" align="right">
					        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
					    </div>
					</div>
				</div>
			</div>
		</div>
	</fieldset>
    <?php ActiveForm::end(); ?>
</div>
