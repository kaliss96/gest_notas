<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "informacion_familiar".
 *
 * @property integer $id_info_fami
 * @property integer $id_est
 * @property integer $cant_hermanas_est
 * @property integer $cant_hermanos_est
 *
 * @property Estudiantes $idEst
 */
class InformacionFamiliar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'informacion_familiar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_est', 'cant_hermanos_est'], 'required', 'message'=>'Campo Obligatorio'],
            [['id_est', 'cant_hermanas_est', 'cant_hermanos_est'], 'integer'],
            [['id_est'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            //'id_info_fami' => 'Id Info Fami',
            //'id_est' => 'Id Est',
            'cant_hermanas_est' => 'Cantidad Hermanas',
            'cant_hermanos_est' => 'Cantidad Hermanos',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEst()
    {
        return $this->hasOne(Estudiantes::className(), ['id_est' => 'id_est']);
    }
}
