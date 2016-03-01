<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TiposDeGrupo;

/**
 * TiposDeGrupoSearch represents the model behind the search form about `app\models\TiposDeGrupo`.
 */
class TiposDeGrupoSearch extends TiposDeGrupo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tipo_grupo'], 'integer'],
            [['nombre_tipo_grupo'], 'safe'],
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
        $query = TiposDeGrupo::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_tipo_grupo' => $this->id_tipo_grupo,
        ]);

        $query->andFilterWhere(['like', 'nombre_tipo_grupo', $this->nombre_tipo_grupo]);

        return $dataProvider;
    }
}
