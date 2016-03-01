<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\InformacionFamiliar;

/**
 * InformacionFamiliarSearch represents the model behind the search form about `app\models\InformacionFamiliar`.
 */
class InformacionFamiliarSearch extends InformacionFamiliar
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_info_fami', 'id_est', 'cant_hermanas_est', 'cant_hermanos_est'], 'integer'],
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
        $query = InformacionFamiliar::find();

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
            'id_info_fami' => $this->id_info_fami,
            'id_est' => $this->id_est,
            'cant_hermanas_est' => $this->cant_hermanas_est,
            'cant_hermanos_est' => $this->cant_hermanos_est,
        ]);

        return $dataProvider;
    }
}
