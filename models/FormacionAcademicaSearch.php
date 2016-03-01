<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\FormacionAcademica;

/**
 * FormacionAcademicaSearch represents the model behind the search form about `app\models\FormacionAcademica`.
 */
class FormacionAcademicaSearch extends FormacionAcademica
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_estudio', 'id_est', 'id_tipo_estudio'], 'integer'],
            [['lugar_estudio'], 'safe'],
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
        $query = FormacionAcademica::find()->where(['id_est'=>$params]);

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
            'id_estudio' => $this->id_estudio,
            'id_est' => $this->id_est,
            'id_tipo_estudio' => $this->id_tipo_estudio,
        ]);

        $query->andFilterWhere(['like', 'lugar_estudio', $this->lugar_estudio]);
        */
        return $dataProvider;
    }
}
