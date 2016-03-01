<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "parentesco".
 *
 * @property integer $id_parentesco
 * @property string $nombre_parentesco
 *
 * @property Parientes[] $parientes
 */
class Parentesco extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'parentesco';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre_parentesco'], 'required', 'message'=>'Campo Obligatorio'],
            [['nombre_parentesco'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_parentesco' => 'Parentesco',
            'nombre_parentesco' => 'Parentesco',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParientes()
    {
        return $this->hasMany(Parientes::className(), ['id_parentesco' => 'id_parentesco']);
    }
}
