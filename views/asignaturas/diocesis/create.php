<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Diocesis */

$this->title = 'Creación de Diócesis';
$this->params['breadcrumbs'][] = ['label' => 'Diócesis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diocesis-create">

    <h1  class="title-form" align="center"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
