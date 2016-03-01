<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Prerrequisitos */

$this->title = 'Prerrequisitos de la Asignaturas: '. $NOMBRE;
$this->params['breadcrumbs'][] = ['label' => 'Prerrequisitos', 'url' => ['indexpre']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prerrequisitos-create">

    <h2 class="title-form" align="center"><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_formpre', [
        'modelPre' => $modelPre,
    ]) ?>

</div>
