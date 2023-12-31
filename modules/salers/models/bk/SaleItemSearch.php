<?php

namespace app\modules\salers\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\salers\models\SaleItem;

/**
 * SaleItemSearch represents the model behind the search form of `app\modules\salers\models\SaleItem`.
 */
class SaleItemSearch extends SaleItem
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'product_id', 'quantity', 'unit', 'status_id', 'order_id'], 'integer'],
            [['price', 'total'], 'number'],
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
        $query = SaleItem::find();

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
            'order_id' => $this->order_id,
            'product_id' => $this->product_id,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'unit' => $this->unit,
            'total' => $this->total,
            'status_id' => $this->status_id,
        ]);

        return $dataProvider;
    }
}
