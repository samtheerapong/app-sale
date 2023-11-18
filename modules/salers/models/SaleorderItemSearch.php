<?php

namespace app\modules\salers\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\salers\models\SaleorderItem;

/**
 * SaleorderItemSearch represents the model behind the search form of `app\modules\salers\models\SaleorderItem`.
 */
class SaleorderItemSearch extends SaleorderItem
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'saleorder_id', 'product_id', 'quantity', 'unit_id', 'status_id'], 'integer'],
            [['due_date'], 'safe'],
            [['price', 'total_price'], 'number'],
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
        $query = SaleorderItem::find();

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
            'saleorder_id' => $this->saleorder_id,
            'due_date' => $this->due_date,
            'product_id' => $this->product_id,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'unit_id' => $this->unit_id,
            'total_price' => $this->total_price,
            'status_id' => $this->status_id,
        ]);

        return $dataProvider;
    }
}
