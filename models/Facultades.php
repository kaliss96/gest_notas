<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "facultades".
 *
 * @property integer $id_facultad
 * @property string $nombre_facultad
 *
 * @property Matriculas[] $matriculas
 * @property PlanDeEstudio[] $planDeEstudios
 */
class Facultades extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'facultades';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre_facultad'], 'required', 'message'=>'Campo Obligatorio'],
            [['nombre_facultad'], 'string', 'max' => 50],
            [['nombre_facultad'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            //'id_facultad' => 'Id Facultad',
            'nombre_facultad' => 'Nombre de la Facultad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMatriculas()
    {
        return $this->hasMany(Matriculas::className(), ['id_facultad' => 'id_facultad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlanDeEstudios()
    {
        return $this->hasMany(PlanDeEstudio::className(), ['id_facultad' => 'id_facultad']);
    }
}
