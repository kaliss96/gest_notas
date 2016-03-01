<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Parientes */

$this->title = 'Creación de Parientes: '. $NOMBRE;
$this->params['breadcrumbs'][] = ['label' => 'Parientes', 'url' => ['indexparientes']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parientes-create">

    <h1 class="title-form" align="center"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formparientes', [
        'modelPar' => $modelPar,
    ]) ?>

</div>
