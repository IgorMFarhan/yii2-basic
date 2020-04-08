<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Diarium;

/**
 * DiariumSearch represents the model behind the search form of `app\models\Diarium`.
 */
class DiariumSearch extends Diarium
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nik'], 'integer'],
            [['unit1', 'unit2', 'lokasi_id', 'kondisi_id', 'submit_date'], 'safe'],
            [['versi_app'], 'number'],
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
        $query = Diarium::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'nik' => $this->nik,
            'submit_date' => $this->submit_date,
            'versi_app' => $this->versi_app,
        ]);

        $query->andFilterWhere(['like', 'unit1', $this->unit1])
            ->andFilterWhere(['like', 'unit2', $this->unit2])
            ->andFilterWhere(['like', 'lokasi_id', $this->lokasi_id])
            ->andFilterWhere(['like', 'kondisi_id', $this->kondisi_id]);

        return $dataProvider;
    }
}
