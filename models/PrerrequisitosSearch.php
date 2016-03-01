<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Prerrequisitos;

/**
 * PrerrequisitosSearch represents the model behind the search form about `app\models\Prerrequisitos`.
 */
class PrerrequisitosSearch extends Prerrequisitos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_prerrequisito', 'prerrequisito', 'id_asig'], 'integer'],
            [['tipo_prerrequisito'], 'boolean'],
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
        $query = Prerrequisitos::find()->where(['prerrequisito'=>$params]);

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
            'id_prerrequisito' => $this->id_prerrequisito,
            'prerrequisito' => $this->prerrequisito,
            'id_asig' => $this->id_asig,
            'tipo_prerrequisito' => $this->tipo_prerrequisito,
        ]);
        */
        return $dataProvider;
    }
}
