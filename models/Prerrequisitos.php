<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prerrequisitos".
 *
 * @property integer $id_prerrequisito
 * @property integer $prerrequisito
 * @property integer $id_asig
 * @property boolean $tipo_prerrequisito
 *
 * @property Asignaturas $prerrequisito0
 * @property Asignaturas $idAsig
 */
class Prerrequisitos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prerrequisitos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prerrequisito', 'id_asig'], 'required', 'message'=>'Campo Obligatorio'],
            [['prerrequisito', 'id_asig'], 'integer'],
            [['tipo_prerrequisito'], 'boolean']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_prerrequisito' => 'Id Prerrequisito',
            'prerrequisito' => 'Prerrequisito',
            'id_asig' => 'Prerrequisito',
            'tipo_prerrequisito' => 'Obligatorio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrerrequisito0()
    {
        return $this->hasOne(Asignaturas::className(), ['id_asig' => 'prerrequisito']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAsig()
    {
        return $this->hasOne(Asignaturas::className(), ['id_asig' => 'id_asig']);
    }
}
