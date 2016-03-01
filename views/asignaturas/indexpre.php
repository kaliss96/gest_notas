<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PrerrequisitosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Prerrequisitos de la Asignatura: '. $NOMBRE;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fondo-index-grid">
    <div class="prerrequisitos-index">
        <h1><?= Html::encode($this->title) ?><?= Html::a('Crear Prerrequisitos', ['createpre', 'id'=>$IDASIG, 'nombre'=>$NOMBRE], ['class' => 'btn btn-success btn-index-right']) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <div class="fondo-grid">
            <?= GridView::widget([
                'dataProvider' => $dataProviderPre,
                //'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    //'id_prerrequisito',
                    ['attribute'=>'id_asig',
                    'value'=>'idAsig.nombre_asig'],
                    //'prerrequisito',
                    'tipo_prerrequisito:boolean',

                    ['class' => 'yii\grid\ActionColumnDelete', 'template' => '{deletedetalle}'],
                ],
            ]); ?>
        </div>
        <?= Html::a('Finalizar', ['view', 'id'=>$IDASIG], ['class' => 'btn btn-primary btn-index-right']) ?>
        <br><br>
    </div>
</div>
