<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "diocesis".
 *
 * @property integer $id_diocesis
 * @property string $nombre_diocesis
 *
 * @property Parroquias[] $parroquias
 */
class Diocesis extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'diocesis';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre_diocesis'], 'required', 'message'=>'Campo Obligatorio'],
            [['nombre_diocesis'], 'string', 'max' => 50],
            [['nombre_diocesis'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            //'id_diocesis' => 'Id Diocesis',
            'nombre_diocesis' => 'Nombre de la Diócesis',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParroquias()
    {
        return $this->hasMany(Parroquias::className(), ['id_diocesis' => 'id_diocesis']);
    }
}
