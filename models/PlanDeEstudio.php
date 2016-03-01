<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "plan_de_estudio".
 *
 * @property integer $id_plan
 * @property integer $id_asig
 * @property integer $id_facultad
 * @property integer $curso
 * @property integer $semestre
 *
 * @property Asignaturas $idAsig
 * @property Facultades $idFacultad
 */
class PlanDeEstudio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'plan_de_estudio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_asig', 'id_facultad', 'curso', 'semestre'], 'required', 'message'=>'Campo Obligatorio'],
            [['id_asig', 'id_facultad', 'curso', 'semestre'], 'integer'],
            [['id_asig'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            //'id_plan' => 'Id Plan',
            //'id_asig' => 'Id Asig',
            'id_facultad' => 'Facultad',
            'curso' => 'Curso',
            'semestre' => 'Semestre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAsig()
    {
        return $this->hasOne(Asignaturas::className(), ['id_asig' => 'id_asig']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdFacultad()
    {
        return $this->hasOne(Facultades::className(), ['id_facultad' => 'id_facultad']);
    }
}
