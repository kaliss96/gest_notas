<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Estudiantes;

/**
 * EstudiantesSearch represents the model behind the search form about `app\models\Estudiantes`.
 */
class EstudiantesSearch extends Estudiantes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_est'], 'integer'],
            [['num_carnet_est', 'nombres_est', 'apellidos_est', 'fecha_nac_est', 'lugar_nac_est', 'telefono_est', 'direccion_dom_est', 'cedula_est'], 'safe'],
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
        $query = Estudiantes::find();

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
            'id_est' => $this->id_est,
            'fecha_nac_est' => $this->fecha_nac_est,
        ]);

        $query->andFilterWhere(['like', 'num_carnet_est', $this->num_carnet_est])
            ->andFilterWhere(['like', 'nombres_est', $this->nombres_est])
            ->andFilterWhere(['like', 'apellidos_est', $this->apellidos_est])
            ->andFilterWhere(['like', 'lugar_nac_est', $this->lugar_nac_est])
            ->andFilterWhere(['like', 'telefono_est', $this->telefono_est])
            ->andFilterWhere(['like', 'direccion_dom_est', $this->direccion_dom_est])
            ->andFilterWhere(['like', 'cedula_est', $this->cedula_est]);

        return $dataProvider;
    }
}
