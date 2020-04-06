<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Laporan;

/**
 * LaporanSearch represents the model behind the search form of `app\models\Laporan`.
 */
class LaporanSearch extends Laporan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'unit1_id', 'unit2_id', 'lokasi_id', 'kondisi_id'], 'integer'],
            [['keterangan', 'submit_date'], 'safe'],
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
        $query = Laporan::find();

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
            'user_id' => $this->user_id,
            'unit1_id' => $this->unit1_id,
            'unit2_id' => $this->unit2_id,
            'lokasi_id' => $this->lokasi_id,
            'kondisi_id' => $this->kondisi_id,
          
            
        ]);

        $query->andFilterWhere(['like', 'keterangan', $this->keterangan]);
        $query->andFilterWhere(['like', 'submit_date', $this->submit_date]);

        return $dataProvider;
    }
}
