<?php

namespace app\modules\it\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\it\models\ItStockList;

/**
 * ItStockListSearch represents the model behind the search form of `app\modules\it\models\ItStockList`.
 */
class ItStockListSearch extends ItStockList
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'stock_id', 'operator', 'receive', 'pick_up', 'docs'], 'integer'],
            [['action_date', 'remask'], 'safe'],
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
        $query = ItStockList::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
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
            'stock_id' => $this->stock_id,
            'action_date' => $this->action_date,
            'operator' => $this->operator,
            'receive' => $this->receive,
            'pick_up' => $this->pick_up,
            'docs' => $this->docs,
        ]);

        $query->andFilterWhere(['like', 'remask', $this->remask]);

        return $dataProvider;
    }
}
