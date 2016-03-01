<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "calificaciones".
 *
 * @property integer $id_matricula
 * @property integer $id_est
 * @property integer $id_grupo
 * @property integer $nota_final
 *
 * @property Estudiantes $idEst
 * @property Grupos $idGrupo
 * @property Matriculas $idMatricula
 */
class Calificaciones extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'calificaciones';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_matricula', 'id_est', 'id_grupo', 'nota_final'], 'required', 'message'=>'Campo Obligatorio'],
            [['id_matricula', 'id_est', 'id_grupo', 'nota_final'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_matricula' => 'Periodo de Estudio',
            'id_est' => 'Estudiante',
            'id_grupo' => 'Grupo',
            'nota_final' => 'Nota Final',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEst()
    {
        return $this->hasOne(Estudiantes::className(), ['id_est' => 'id_est']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdGrupo()
    {
        return $this->hasOne(Grupos::className(), ['id_grupo' => 'id_grupo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMatricula()
    {
        return $this->hasOne(Matriculas::className(), ['id_matricula' => 'id_matricula']);
    }
}
