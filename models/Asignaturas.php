<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "asignaturas".
 *
 * @property integer $id_asig
 * @property string $cod_asig
 * @property string $nombre_asig
 * @property integer $total_horas_asig
 * @property integer $creditos_asig
 * @property string $especificacion_asig
 *
 * @property Grupos[] $grupos
 * @property PlanDeEstudio $planDeEstudio
 * @property Prerrequisitos[] $prerrequisitos
 */
class Asignaturas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'asignaturas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cod_asig', 'nombre_asig', 'creditos_asig'], 'required', 'message'=>'Campo Obligatorio'],
            [['total_horas_asig', 'creditos_asig'], 'integer'],
            [['cod_asig'], 'string', 'max' => 8],
            [['nombre_asig'], 'string', 'max' => 80],
            [['especificacion_asig'], 'string', 'max' => 50],
            [['cod_asig'], 'unique'],
            [['nombre_asig'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            //'id_asig' => 'Id Asig',
            'cod_asig' => 'Código de Asignatura',
            'nombre_asig' => 'Nombre de Asignatura',
            'total_horas_asig' => 'Total de Horas de Asignatura',
            'creditos_asig' => 'Creditos de Asignatura',
            'especificacion_asig' => 'Especificacion de Asignatura',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupos()
    {
        return $this->hasMany(Grupos::className(), ['id_asig' => 'id_asig']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlanDeEstudio()
    {
        return $this->hasOne(PlanDeEstudio::className(), ['id_asig' => 'id_asig']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrerrequisitos()
    {
        return $this->hasMany(Prerrequisitos::className(), ['prerrequisito' => 'id_asig']);
    }
}
