<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Calificaciones;

/**
 * CalificacionesSearch represents the model behind the search form about `app\models\Calificaciones`.
 */
class CalificacionesSearch extends Calificaciones
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_matricula', 'id_est', 'id_grupo', 'nota_final'], 'integer'],
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
        $query = Calificaciones::find()->where(['id_est'=>$params]);

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
            'id_matricula' => $this->id_matricula,
            'id_est' => $this->id_est,
            'id_grupo' => $this->id_grupo,
            'nota_final' => $this->nota_final,
        ]);
        */
        return $dataProvider;
    }

    public function searchpormatri($id, $matri)
    {
        $query = Calificaciones::find()->where(['id_est'=>$id, 'id_matricula'=>$matri]);
        $dataProvider = new ActiveDataProvider(['query' => $query,]);
        
        return $dataProvider;
    }
}
