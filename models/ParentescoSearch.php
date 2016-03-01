<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Parentesco;

/**
 * ParentescoSearch represents the model behind the search form about `app\models\Parentesco`.
 */
class ParentescoSearch extends Parentesco
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_parentesco'], 'integer'],
            [['nombre_parentesco'], 'safe'],
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
        $query = Parentesco::find();

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
            'id_parentesco' => $this->id_parentesco,
        ]);

        $query->andFilterWhere(['like', 'nombre_parentesco', $this->nombre_parentesco]);

        return $dataProvider;
    }
}
