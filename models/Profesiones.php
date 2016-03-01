<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "profesiones".
 *
 * @property integer $id_profesion
 * @property string $nombre_profesion
 *
 * @property Parientes[] $parientes
 */
class Profesiones extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profesiones';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre_profesion'], 'required', 'message'=>'Campo Obligatorio'],
            [['nombre_profesion'], 'string', 'max' => 50],
            [['nombre_profesion'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_profesion' => 'Id Profesion',
            'nombre_profesion' => 'Nombre Profesion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParientes()
    {
        return $this->hasMany(Parientes::className(), ['id_profesion' => 'id_profesion']);
    }
}
