<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Grupos;

/**
 * GruposSearch represents the model behind the search form about `app\models\Grupos`.
 */
class GruposSearch extends Grupos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_grupo', 'id_doc', 'id_asig'], 'integer'],
            [['id_tipo_grupo','cod_grupo'], 'safe'],
            [['activo'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Grupos::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('idTipoGrupo');

        $query->andFilterWhere([
            'id_grupo' => $this->id_grupo,
            //'id_tipo_grupo' => $this->id_tipo_grupo,
            'id_doc' => $this->id_doc,
            'id_asig' => $this->id_asig,
            'activo' => $this->activo,
        ]);

        $query->andFilterWhere(['like', 'cod_grupo', $this->cod_grupo])
            ->andFilterWhere(['like', 'tipos_de_grupo.nombre_tipo_grupo', $this->id_tipo_grupo]);

        return $dataProvider;
    }
}
