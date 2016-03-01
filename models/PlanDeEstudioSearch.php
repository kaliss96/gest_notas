<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PlanDeEstudio;

/**
 * PlanDeEstudioSearch represents the model behind the search form about `app\models\PlanDeEstudio`.
 */
class PlanDeEstudioSearch extends PlanDeEstudio
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_plan', 'id_asig', 'id_facultad', 'curso', 'semestre'], 'integer'],
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
        $query = PlanDeEstudio::find();

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
            'id_plan' => $this->id_plan,
            'id_asig' => $this->id_asig,
            'id_facultad' => $this->id_facultad,
            'curso' => $this->curso,
            'semestre' => $this->semestre,
        ]);

        return $dataProvider;
    }
}
