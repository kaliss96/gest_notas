<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\FormacionAcademica */

$this->title = 'Formacion Academica del Estudiante: '. $NOMBRE;
$this->params['breadcrumbs'][] = ['label' => 'Formacion Académica', 'url' => ['indexacad']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="formacion-academica-create">

    <h2 class="title-form" align="center"><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_formacad', [
        'modelAcad' => $modelAcad,
    ]) ?>

</div>
