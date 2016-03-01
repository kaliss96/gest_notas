<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ParientesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Parientes del Estudiante: '. $NOMBRE;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fondo-index-grid">
    <div class="parientes-index">
        <h1><?= Html::encode($this->title) ?><?= Html::a('Crear Parientes', ['createpariente', 'id'=>$IDEST, 'nombre'=>$NOMBRE], ['class' => 'btn btn-success btn-index-right']) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>   
        <div class="fondo-grid">
            <?= GridView::widget([
                'dataProvider' => $dataProviderPar,
                //'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    //'id_pariente',
                    //'id_est',
                    'nombre_pariente',
                    ['attribute'=>'id_parentesco',
                    'value'=>'idParentesco.nombre_parentesco'],
                    ['attribute'=>'id_profesion',
                    'value'=>'idProfesion.nombre_profesion'],

                    ['class' => 'yii\grid\ActionColumnDelete', 'template' => '{deletedetalle}'],
                ],
            ]); ?>
        </div>
        <?= Html::a('Siguiente', ['indexacad', 'id'=>$IDEST, 'nombre'=>$NOMBRE], ['class' => 'btn btn-success btn-index-right'])     ?>
        <br><br>
    </div>
</div>
