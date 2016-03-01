<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Parientes;

/**
 * ParientesSearch represents the model behind the search form about `app\models\Parientes`.
 */
class ParientesSearch extends Parientes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pariente', 'id_est', 'id_parentesco', 'id_profesion'], 'integer'],
            [['nombre_pariente'], 'safe'],
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
        $query = Parientes::find()->where(['id_est'=>$params]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        /*
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_pariente' => $this->id_pariente,
            'id_est' => $this->id_est,
            'id_parentesco' => $this->id_parentesco,
            'id_profesion' => $this->id_profesion,
        ]);

        $query->andFilterWhere(['like', 'nombre_pariente', $this->nombre_pariente]);
        */
        return $dataProvider;
    }
}
