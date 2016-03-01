<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "grupos".
 *
 * @property integer $id_grupo
 * @property string $cod_grupo
 * @property integer $id_tipo_grupo
 * @property integer $id_doc
 * @property integer $id_asig
 * @property boolean $activo
 *
 * @property AvanceDePlan[] $avanceDePlans
 * @property TiposDeGrupo $idTipoGrupo
 * @property Docentes $idDoc
 * @property Asignaturas $idAsig
 * @property Horarios[] $horarios
 */
class Grupos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'grupos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cod_grupo', 'id_tipo_grupo', 'id_doc', 'id_asig'], 'required', 'message'=>'Campo Obligatorio'],
            [['id_tipo_grupo', 'id_doc', 'id_asig'], 'integer'],
            [['activo'], 'boolean'],
            [['cod_grupo'], 'string', 'max' => 50],
            [['cod_grupo'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            //'id_grupo' => 'Id Grupo',
            'cod_grupo' => 'Código de Grupo',
            'id_tipo_grupo' => 'Tipo de Grupo',
            'id_doc' => 'Docente',
            'id_asig' => 'Asignatura',
            'activo' => 'Activo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAvanceDePlans()
    {
        return $this->hasMany(AvanceDePlan::className(), ['id_grupo' => 'id_grupo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipoGrupo()
    {
        return $this->hasOne(TiposDeGrupo::className(), ['id_tipo_grupo' => 'id_tipo_grupo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDoc()
    {
        return $this->hasOne(Docentes::className(), ['id_doc' => 'id_doc']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAsig()
    {
        return $this->hasOne(Asignaturas::className(), ['id_asig' => 'id_asig']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHorarios()
    {
        return $this->hasMany(Horarios::className(), ['id_grupo' => 'id_grupo']);
    }
}
