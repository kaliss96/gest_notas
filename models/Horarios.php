<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "horarios".
 *
 * @property integer $id_horario
 * @property integer $id_grupo
 * @property string $hora_inicio
 * @property string $hora_fin
 * @property string $aula
 *
 * @property Grupos $idGrupo
 */
class Horarios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'horarios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_grupo', 'hora_inicio', 'hora_fin', 'aula'], 'required', 'message'=>'Campo Obligatorio'],
            [['id_grupo'], 'integer'],
            [['hora_inicio', 'hora_fin'], 'safe'],
            [['aula'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_horario' => 'Id Horario',
            'id_grupo' => 'Id Grupo',
            'hora_inicio' => 'Hora Inicio',
            'hora_fin' => 'Hora Fin',
            'aula' => 'Aula',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdGrupo()
    {
        return $this->hasOne(Grupos::className(), ['id_grupo' => 'id_grupo']);
    }
}
