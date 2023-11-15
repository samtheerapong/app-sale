<?php

namespace app\modules\salers\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\salers\models\SaleOrder;

/**
 * SaleOrderSearch represents the model behind the search form of `app\modules\salers\models\SaleOrder`.
 */
class SaleOrderSearch extends SaleOrder
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'customer_id', 'item_id', 'salers_id', 'payment_id', 'status'], 'integer'],
            [['po_number', 'sale_ordercol', 'new_deadline', 'remask'], 'safe'],
            [['percent_vat', 'discount', 'grand_total'], 'number'],
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
        $query = SaleOrder::find();

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
            'customer_id' => $this->customer_id,
            'item_id' => $this->item_id,
            'salers_id' => $this->salers_id,
            'new_deadline' => $this->new_deadline,
            'payment_id' => $this->payment_id,
            'percent_vat' => $this->percent_vat,
            'discount' => $this->discount,
            'grand_total' => $this->grand_total,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'po_number', $this->po_number])
            ->andFilterWhere(['like', 'sale_ordercol', $this->sale_ordercol])
            ->andFilterWhere(['like', 'remask', $this->remask]);

        return $dataProvider;
    }
}
