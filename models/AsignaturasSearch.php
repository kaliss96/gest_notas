<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Asignaturas;

/**
 * AsignaturasSearch represents the model behind the search form about `app\models\Asignaturas`.
 */
class AsignaturasSearch extends Asignaturas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_asig', 'total_horas_asig', 'creditos_asig'], 'integer'],
            [['cod_asig', 'nombre_asig', 'especificacion_asig'], 'safe'],
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
        $query = Asignaturas::find();

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
            'id_asig' => $this->id_asig,
            'total_horas_asig' => $this->total_horas_asig,
            'creditos_asig' => $this->creditos_asig,
        ]);

        $query->andFilterWhere(['like', 'cod_asig', $this->cod_asig])
            ->andFilterWhere(['like', 'nombre_asig', $this->nombre_asig])
            ->andFilterWhere(['like', 'especificacion_asig', $this->especificacion_asig]);

        return $dataProvider;
    }
}
