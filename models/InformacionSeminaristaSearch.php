<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\InformacionSeminarista;

/**
 * InformacionSeminaristaSearch represents the model behind the search form about `app\models\InformacionSeminarista`.
 */
class InformacionSeminaristaSearch extends InformacionSeminarista
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_info_semi', 'id_est', 'id_parroquia'], 'integer'],
            [['fecha_ingreso_est', 'observaciones'], 'safe'],
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
        $query = InformacionSeminarista::find();

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
            'id_info_semi' => $this->id_info_semi,
            'id_est' => $this->id_est,
            'id_parroquia' => $this->id_parroquia,
            'fecha_ingreso_est' => $this->fecha_ingreso_est,
        ]);

        $query->andFilterWhere(['like', 'observaciones', $this->observaciones]);

        return $dataProvider;
    }
}
