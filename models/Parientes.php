<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "parientes".
 *
 * @property integer $id_pariente
 * @property integer $id_est
 * @property string $nombre_pariente
 * @property integer $id_parentesco
 * @property integer $id_profesion
 *
 * @property Estudiantes $idEst
 * @property Parentesco $idParentesco
 * @property Profesiones $idProfesion
 */
class Parientes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'parientes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_est', 'nombre_pariente', 'id_parentesco', 'id_profesion'], 'required', 'message'=>'Campo Obligatorio'],
            [['id_est', 'id_parentesco', 'id_profesion'], 'integer'],
            [['nombre_pariente'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pariente' => 'Id Pariente',
            'id_est' => 'Id Est',
            'nombre_pariente' => 'Nombre del Pariente',
            'id_parentesco' => 'Parentesco',
            'id_profesion' => 'Profesión',
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
    public function getIdParentesco()
    {
        return $this->hasOne(Parentesco::className(), ['id_parentesco' => 'id_parentesco']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProfesion()
    {
        return $this->hasOne(Profesiones::className(), ['id_profesion' => 'id_profesion']);
    }
}
