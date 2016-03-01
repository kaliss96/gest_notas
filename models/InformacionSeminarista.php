<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "informacion_seminarista".
 *
 * @property integer $id_info_semi
 * @property integer $id_est
 * @property integer $id_parroquia
 * @property string $fecha_ingreso_est
 * @property string $observaciones
 *
 * @property Estudiantes $idEst
 * @property Parroquias $idParroquia
 */
class InformacionSeminarista extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'informacion_seminarista';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_est', 'id_parroquia', 'fecha_ingreso_est'], 'required', 'message'=>'Campo Obligatorio'],
            [['id_est', 'id_parroquia'], 'integer'],
            [['fecha_ingreso_est'], 'safe'],
            [['observaciones'], 'string', 'max' => 100],
            [['id_est'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_info_semi' => 'Id Info Semi',
            'id_est' => 'Id Est',
            'id_parroquia' => 'Parroquia',
            'fecha_ingreso_est' => 'Fecha Ingreso',
            'observaciones' => 'Observaciones',
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
    public function getIdParroquia()
    {
        return $this->hasOne(Parroquias::className(), ['id_parroquia' => 'id_parroquia']);
    }
}
