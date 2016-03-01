<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DocentesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Docentes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fondo-index-grid">
<div class="docentes-index">

    <h1><?= Html::encode($this->title) ?> <?= Html::a('Crear Docentes', ['create'], ['class' => 'btn btn-success btn-index-right']) ?></h1>
    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="fondo-grid">
	    <?= GridView::widget([
	        'dataProvider' => $dataProvider,
	        'filterModel' => $searchModel,
	        'columns' => [
	            ['class' => 'yii\grid\SerialColumn'],

	            //'id_doc',
	            'num_carnet_doc',
	            'nombres_doc',
	            'apellidos_doc',
	            'cedula_doc',
	            'telefono_doc',
	            'email_doc:email',

	            ['class' => 'yii\grid\ActionColumn'],
	        ],
	    ]); ?>
	</div>
</div>
</div>
