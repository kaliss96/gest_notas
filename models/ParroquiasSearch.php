<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Parroquias;

/**
 * ParroquiasSearch represents the model behind the search form about `app\models\Parroquias`.
 */
class ParroquiasSearch extends Parroquias
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_parroquia', 'id_diocesis'], 'integer'],
            [['nombre_parroquia'], 'safe'],
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
        $query = Parroquias::find();

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
            'id_parroquia' => $this->id_parroquia,
            'id_diocesis' => $this->id_diocesis,
        ]);

        $query->andFilterWhere(['like', 'nombre_parroquia', $this->nombre_parroquia]);

        return $dataProvider;
    }
}
