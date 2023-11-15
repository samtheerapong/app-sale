<?php

namespace app\modules\salers\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\salers\models\OrdersItem;

/**
 * OrdersItemSearch represents the model behind the search form of `app\modules\salers\models\OrdersItem`.
 */
class OrdersItemSearch extends OrdersItem
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'orders_id', 'products_id', 'status_id'], 'integer'],
            [['qty', 'price', 'unit', 'amount'], 'safe'],
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
        $query = OrdersItem::find();

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
            'orders_id' => $this->orders_id,
            'products_id' => $this->products_id,
            'status_id' => $this->status_id,
        ]);

        $query->andFilterWhere(['like', 'qty', $this->qty])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'unit', $this->unit])
            ->andFilterWhere(['like', 'amount', $this->amount]);

        return $dataProvider;
    }
}
