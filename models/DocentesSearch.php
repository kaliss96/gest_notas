<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Docentes;

/**
 * DocentesSearch represents the model behind the search form about `app\models\Docentes`.
 */
class DocentesSearch extends Docentes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_doc'], 'integer'],
            [['num_carnet_doc', 'nombres_doc', 'apellidos_doc', 'cedula_doc', 'telefono_doc', 'email_doc'], 'safe'],
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
        $query = Docentes::find();

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
            'id_doc' => $this->id_doc,
        ]);

        $query->andFilterWhere(['like', 'num_carnet_doc', $this->num_carnet_doc])
            ->andFilterWhere(['like', 'nombres_doc', $this->nombres_doc])
            ->andFilterWhere(['like', 'apellidos_doc', $this->apellidos_doc])
            ->andFilterWhere(['like', 'cedula_doc', $this->cedula_doc])
            ->andFilterWhere(['like', 'telefono_doc', $this->telefono_doc])
            ->andFilterWhere(['like', 'email_doc', $this->email_doc]);

        return $dataProvider;
    }
}
