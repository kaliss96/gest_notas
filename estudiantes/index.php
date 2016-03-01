<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EstudiantesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Estudiantes';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="fondo-index-grid">
<div class="estudiantes-index">

    <h1><?= Html::encode($this->title) ?> <?= Html::a('Crear Estudiantes', ['create'], ['class' => 'btn btn-success btn-index-right']) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        

	<div class="fondo-grid">
	    <?= GridView::widget([
	        'dataProvider' => $dataProviderEst,
	        'filterModel' => $searchModelEst,
	        'columns' => [
	            ['class' => 'yii\grid\SerialColumn'],

	            //'id_est',
	            'num_carnet_est',
	            'nombres_est',
	            'apellidos_est',
	            //'fecha_nac_est',
	            //'lugar_nac_est',
	            'telefono_est',
	            //'direccion_dom_est',
	            'cedula_est',

	            ['class' => 'yii\grid\ActionColumn'],
	        ],
	    ]); ?>
	</div>
</div>
</div>
