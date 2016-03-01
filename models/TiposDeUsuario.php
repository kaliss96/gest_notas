<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipos_de_usuario".
 *
 * @property integer $id_tipo_usuario
 * @property string $nombre_tipo_usuario
 *
 * @property Usuarios[] $usuarios
 */
class TiposDeUsuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipos_de_usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre_tipo_usuario'], 'required', 'message'=>'Campo Obligatorio'],
            [['nombre_tipo_usuario'], 'string', 'max' => 25],
            [['nombre_tipo_usuario'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            //'id_tipo_usuario' => 'Id Tipo Usuario',
            'nombre_tipo_usuario' => 'Tipo de Usuario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuarios::className(), ['id_tipo_usuario' => 'id_tipo_usuario']);
    }
}
