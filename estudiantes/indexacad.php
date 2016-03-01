<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FormacionAcademicaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Formacion Académica del Estudiante: '. $NOMBRE;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fondo-index-grid">
    <div class="formacion-academica-index">
        <h3><?= Html::encode($this->title) ?><?= Html::a('Crear Registro Académico', ['createacad', 'id'=>$IDEST, 'nombre'=>$NOMBRE], ['class' => 'btn btn-success btn-index-right']) ?></h3>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <div class="fondo-grid">
            <?= GridView::widget([
                'dataProvider' => $dataProviderAcad,
                //'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    //'id_estudio',
                    //'id_est',
                    'lugar_estudio',
                    ['attribute'=>'id_tipo_estudio',
                    'value'=>'idTipoEstudio.nombre_tipo_estudio'],

                    ['class' => 'yii\grid\ActionColumnDelete', 'template' => '{deletedetalle2}'],
                ],
            ]); ?>
        </div>
        <?= Html::a('Finalizar', ['view', 'id'=>$IDEST], ['class' => 'btn btn-primary btn-index-right'])     ?>
        <br><br>
    </div>
</div>
