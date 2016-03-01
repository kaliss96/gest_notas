<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Facultades;

/**
 * FacultadesSearch represents the model behind the search form about `app\models\Facultades`.
 */
class FacultadesSearch extends Facultades
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_facultad'], 'integer'],
            [['nombre_facultad'], 'safe'],
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
        $query = Facultades::find();

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
            'id_facultad' => $this->id_facultad,
        ]);

        $query->andFilterWhere(['like', 'nombre_facultad', $this->nombre_facultad]);

        return $dataProvider;
    }
}
