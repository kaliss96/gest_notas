<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estudiantes".
 *
 * @property integer $id_est
 * @property string $num_carnet_est
 * @property string $nombres_est
 * @property string $apellidos_est
 * @property string $fecha_nac_est
 * @property string $lugar_nac_est
 * @property string $telefono_est
 * @property string $direccion_dom_est
 * @property string $cedula_est
 *
 * @property AvanceDePlan[] $avanceDePlans
 * @property FormacionAcademica[] $formacionAcademicas
 * @property InformacionFamiliar $informacionFamiliar
 * @property InformacionSeminarista $informacionSeminarista
 * @property Parientes[] $parientes
 */
class Estudiantes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estudiantes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['num_carnet_est', 'nombres_est', 'apellidos_est', 'fecha_nac_est', 'lugar_nac_est', 'telefono_est', 'direccion_dom_est'], 'required', 'message'=>'Campo Obligatorio'],
            [['fecha_nac_est'], 'safe'],
            [['num_carnet_est', 'nombres_est', 'apellidos_est', 'lugar_nac_est', 'telefono_est', 'cedula_est'], 'string', 'max' => 50],
            [['direccion_dom_est'], 'string', 'max' => 100],
            [['num_carnet_est'], 'unique'],
            [['cedula_est'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_est' => 'Estudiantes',
            'num_carnet_est' => 'Número de Carnet',
            'nombres_est' => 'Nombres del Estudiante',
            'apellidos_est' => 'Apellidos del Estudiante',
            'fecha_nac_est' => 'Fecha de Nacimiento',
            'lugar_nac_est' => 'Lugar de Nacimiento',
            'telefono_est' => 'Teléfono',
            'direccion_dom_est' => 'Direccion de Domicilio',
            'cedula_est' => 'Cédula',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAvanceDePlans()
    {
        return $this->hasMany(AvanceDePlan::className(), ['id_est' => 'id_est']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFormacionAcademicas()
    {
        return $this->hasMany(FormacionAcademica::className(), ['id_est' => 'id_est']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInformacionFamiliar()
    {
        return $this->hasOne(InformacionFamiliar::className(), ['id_est' => 'id_est']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInformacionSeminarista()
    {
        return $this->hasOne(InformacionSeminarista::className(), ['id_est' => 'id_est']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParientes()
    {
        return $this->hasMany(Parientes::className(), ['id_est' => 'id_est']);
    }
    public function getEstudiantes()
    {
      return $this->nombres_est .' '. $this->apellidos_est;
    }
}
