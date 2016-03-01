<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuarios".
 *
 * @property integer $id_usuario
 * @property integer $id_tipo_usuario
 * @property string $nombre_usuario
 * @property string $email_usuario
 * @property string $contrasena_usuario
 *
 * @property TiposDeUsuario $idTipoUsuario
 */
class Usuarios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuarios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tipo_usuario', 'nombre_usuario', 'email_usuario', 'contrasena_usuario'], 'required', 'message'=>'Campo Obligatorio'],
            [['id_tipo_usuario'], 'integer'],
            [['nombre_usuario', 'contrasena_usuario'], 'string', 'max' => 25],
            [['email_usuario'], 'string', 'max' => 50],
            [['nombre_usuario'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            //'id_usuario' => 'Id Usuario',
            'id_tipo_usuario' => 'Tipo de Usuario',
            'nombre_usuario' => 'Nombre del Usuario',
            'email_usuario' => 'E-mail',
            'contrasena_usuario' => 'Contraseña',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipoUsuario()
    {
        return $this->hasOne(TiposDeUsuario::className(), ['id_tipo_usuario' => 'id_tipo_usuario']);
    }
}
