<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipos_de_grupo".
 *
 * @property integer $id_tipo_grupo
 * @property string $nombre_tipo_grupo
 *
 * @property Grupos[] $grupos
 */
class TiposDeGrupo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipos_de_grupo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre_tipo_grupo'], 'required', 'message'=>'Campo Obligatorio'],
            [['nombre_tipo_grupo'], 'string', 'max' => 50],
            [['nombre_tipo_grupo'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            //'id_tipo_grupo' => 'Id Tipo Grupo',
            'nombre_tipo_grupo' => 'Tipo de Grupo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupos()
    {
        return $this->hasMany(Grupos::className(), ['id_tipo_grupo' => 'id_tipo_grupo']);
    }
}
