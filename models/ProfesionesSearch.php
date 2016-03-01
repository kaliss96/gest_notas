<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Profesiones;

/**
 * ProfesionesSearch represents the model behind the search form about `app\models\Profesiones`.
 */
class ProfesionesSearch extends Profesiones
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_profesion'], 'integer'],
            [['nombre_profesion'], 'safe'],
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
        $query = Profesiones::find();

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
            'id_profesion' => $this->id_profesion,
        ]);

        $query->andFilterWhere(['like', 'nombre_profesion', $this->nombre_profesion]);

        return $dataProvider;
    }
}
