<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "docentes".
 *
 * @property integer $id_doc
 * @property string $num_carnet_doc
 * @property string $nombres_doc
 * @property string $apellidos_doc
 * @property string $cedula_doc
 * @property string $telefono_doc
 * @property string $email_doc
 *
 * @property Grupos[] $grupos
 */
class Docentes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'docentes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['num_carnet_doc', 'nombres_doc', 'apellidos_doc', 'cedula_doc'], 'required', 'message'=>'Campo Obligatorio'],
            [['num_carnet_doc', 'nombres_doc', 'apellidos_doc', 'cedula_doc', 'telefono_doc', 'email_doc'], 'string', 'max' => 50],
            [['cedula_doc'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            //'id_doc' => 'Id Doc',
            'num_carnet_doc' => 'Número de Carnet',
            'nombres_doc' => 'Nombre del Docente',
            'apellidos_doc' => 'Apellidos del Docente',
            'cedula_doc' => 'Cédula',
            'telefono_doc' => 'Teléfono',
            'email_doc' => 'E-mail',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupos()
    {
        return $this->hasMany(Grupos::className(), ['id_doc' => 'id_doc']);
    }

    public function getDocentes()
    {
      return $this->nombres_doc .' '. $this->apellidos_doc;
    }
}
