<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "parroquias".
 *
 * @property integer $id_parroquia
 * @property integer $id_diocesis
 * @property string $nombre_parroquia
 *
 * @property InformacionSeminarista[] $informacionSeminaristas
 * @property Diocesis $idDiocesis
 */
class Parroquias extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'parroquias';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_diocesis', 'nombre_parroquia'], 'required', 'message'=>'Campo Obligatorio'],
            [['id_diocesis'], 'integer'],
            [['nombre_parroquia'], 'string', 'max' => 50],
            [['nombre_parroquia'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            //'id_parroquia' => 'Id Parroquia',
            'id_diocesis' => 'Nombre de la Diócesis',
            'nombre_parroquia' => 'Nombre de la Parroquia',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInformacionSeminaristas()
    {
        return $this->hasMany(InformacionSeminarista::className(), ['id_parroquia' => 'id_parroquia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDiocesis()
    {
        return $this->hasOne(Diocesis::className(), ['id_diocesis' => 'id_diocesis']);
    }
}
