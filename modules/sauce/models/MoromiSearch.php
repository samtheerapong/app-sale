<?php

namespace app\modules\sauce\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\sauce\models\Moromi;

/**
 * MoromiSearch represents the model behind the search form of `app\modules\sauce\models\Moromi`.
 */
class MoromiSearch extends Moromi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'type_id', 'status_id', 'created_by', 'updated_by', 'tank_source', 'tank_destination'], 'integer'],
            [['code', 'batch_no', 'shikomi_date', 'transfer_date', 'tank_source', 'tank_destination', 'created_at', 'updated_at', 'remask'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Moromi::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC, 
                ],
            ],
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
            'shikomi_date' => $this->shikomi_date,
            'transfer_date' => $this->transfer_date,
            'type_id' => $this->type_id,
            'status_id' => $this->status_id,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'tank_source' => $this->tank_source,
            'tank_destination' => $this->tank_destination,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'batch_no', $this->batch_no])
            ->andFilterWhere(['like', 'remask', $this->remask])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at]);

        return $dataProvider;
    }
}
