<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Asignaturas;

/* @var $this yii\web\View */
/* @var $model app\models\Prerrequisitos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prerrequisitos-form">
    <?php $form = ActiveForm::begin(); ?>
	<hr>
	<fieldset>
		<div class="imagen">
			<div class="row">
				<div class="col-lg-6 col-lg-offset-3">
					<div class="formularios">
						<?= $form->field($modelPre, 'id_asig')->dropDownList(
                        ArrayHelper::map(Asignaturas::find()->all(),
                        'id_asig',
                        'nombre_asig'))?>

					    <?= $form->field($modelPre, 'tipo_prerrequisito')->checkbox() ?>

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
