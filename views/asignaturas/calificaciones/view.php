<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Calificaciones */

$this->title = $model->id_est;
$this->params['breadcrumbs'][] = ['label' => 'Calificaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="calificaciones-view">
    <h1  class="title-form" align="center"><?= Html::encode($this->title) ?></h1>
    <hr>
    <fieldset>
        <div class="imagen">
            <div class="row">
                <div class="col-lg-6 col-lg-offset3">
                    <div class="formularios">
                        <?= DetailView::widget([
                            'model' => $model,
                            'attributes' => [
                                'id_matricula',
                                'id_est',
                                'id_grupo',
                                'nota_final',
                            ],
                        ]) ?>
                        <p align="right">
                            <?= Html::a('Update', ['update', 'id_matricula' => $model->id_matricula, 'id_est' => $model->id_est, 'id_grupo' => $model->id_grupo], ['class' => 'btn btn-primary']) ?>
                            <?= Html::a('Delete', ['delete', 'id_matricula' => $model->id_matricula, 'id_est' => $model->id_est, 'id_grupo' => $model->id_grupo], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'post',
                                ],
                            ]) ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </fieldset>
</div>
