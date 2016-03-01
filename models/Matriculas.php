<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "matriculas".
 *
 * @property integer $id_matricula
 * @property string $cod_matricula
 * @property integer $id_facultad
 * @property integer $curso
 * @property integer $semestre
 *
 * @property Calificaciones[] $calificaciones
 * @property Facultades $idFacultad
 */
class Matriculas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'matriculas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cod_matricula', 'id_facultad', 'curso', 'semestre'], 'required'],
            [['id_facultad', 'curso', 'semestre'], 'integer'],
            [['cod_matricula'], 'string', 'max' => 50],
            [['cod_matricula'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_matricula' => 'Id Matricula',
            'cod_matricula' => 'Código del Periodo',
            'id_facultad' => 'Facultad',
            'curso' => 'Curso',
            'semestre' => 'Semestre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalificaciones()
    {
        return $this->hasMany(Calificaciones::className(), ['id_matricula' => 'id_matricula']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdFacultad()
    {
        return $this->hasOne(Facultades::className(), ['id_facultad' => 'id_facultad']);
    }

    public function getInformacion()
    {
        return $this->cod_matricula.' :   '.$this->curso.'A  /  '.$this->semestre.'S'; 
    }
}
