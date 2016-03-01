<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "formacion_academica".
 *
 * @property integer $id_estudio
 * @property integer $id_est
 * @property string $lugar_estudio
 * @property integer $id_tipo_estudio
 *
 * @property Estudiantes $idEst
 * @property TiposDeEstudio $idTipoEstudio
 */
class FormacionAcademica extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'formacion_academica';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_est', 'lugar_estudio', 'id_tipo_estudio'], 'required', 'message'=>'Campo Obligatorio'],
            [['id_est', 'id_tipo_estudio'], 'integer'],
            [['lugar_estudio'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_estudio' => 'Id Estudio',
            'id_est' => 'Id Est',
            'lugar_estudio' => 'Lugar de Estudio',
            'id_tipo_estudio' => 'Tipo de Estudio',
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
    public function getIdTipoEstudio()
    {
        return $this->hasOne(TiposDeEstudio::className(), ['id_tipo_estudio' => 'id_tipo_estudio']);
    }
}
