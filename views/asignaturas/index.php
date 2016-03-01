<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AsignaturasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Asignaturas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fondo-index-grid">
    <div class="asignaturas-index">
        <h1><?= Html::encode($this->title) ?><?= Html::a('Crear Asignaturas', ['create'], ['class' => 'btn btn-success btn-index-right']) ?></h1>
    	<?php //echo $this->render('_search', ['model' => $searchModel]); ?>
    	<div class="fondo-grid">
            <?= GridView::widget([
                'dataProvider' => $dataProviderAsig,
                'filterModel' => $searchModelAsig,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    //'id_asig',
                    'cod_asig',
                    'nombre_asig',
                    'total_horas_asig',
                    'creditos_asig',
                    'especificacion_asig',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
</div>
