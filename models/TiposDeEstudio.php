<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipos_de_estudio".
 *
 * @property integer $id_tipo_estudio
 * @property string $nombre_tipo_estudio
 *
 * @property FormacionAcademica[] $formacionAcademicas
 */
class TiposDeEstudio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipos_de_estudio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre_tipo_estudio'], 'required', 'message'=>'Campo Obligatorio'],
            [['nombre_tipo_estudio'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            //'id_tipo_estudio' => 'Id Tipo Estudio',
            'nombre_tipo_estudio' => 'Tipo de Estudio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFormacionAcademicas()
    {
        return $this->hasMany(FormacionAcademica::className(), ['id_tipo_estudio' => 'id_tipo_estudio']);
    }
}
