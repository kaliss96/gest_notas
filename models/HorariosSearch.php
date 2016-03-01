<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Horarios;

/**
 * HorariosSearch represents the model behind the search form about `app\models\Horarios`.
 */
class HorariosSearch extends Horarios
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_horario', 'id_grupo'], 'integer'],
            [['hora_inicio', 'hora_fin', 'aula'], 'safe'],
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
        $query = Horarios::find()->where(['id_grupo'=>$params]);

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
        /*
        $query->andFilterWhere([
            'id_horario' => $this->id_horario,
            'id_grupo' => $this->id_grupo,
            'hora_inicio' => $this->hora_inicio,
            'hora_fin' => $this->hora_fin,
        ]);
        
        $query->andFilterWhere(['like', 'aula', $this->aula]);
        */
        return $dataProvider;
    }
}
