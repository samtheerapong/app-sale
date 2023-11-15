<?php

namespace app\modules\salers\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\salers\models\Orders;

/**
 * OrdersSearch represents the model behind the search form of `app\modules\salers\models\Orders`.
 */
class OrdersSearch extends Orders
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'customer_id', 'payment_term', 'paid_status', 'users_id'], 'integer'],
            [['po_no', 'deadline_date', 'deadline_new', 'gross_amount', 'vat_charge_rate', 'vat_charge', 'discount', 'net_amount'], 'safe'],
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
        $query = Orders::find();

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
            'deadline_date' => $this->deadline_date,
            'deadline_new' => $this->deadline_new,
            'payment_term' => $this->payment_term,
            'paid_status' => $this->paid_status,
            'users_id' => $this->users_id,
        ]);

        $query->andFilterWhere(['like', 'po_no', $this->po_no])
            ->andFilterWhere(['like', 'gross_amount', $this->gross_amount])
            ->andFilterWhere(['like', 'vat_charge_rate', $this->vat_charge_rate])
            ->andFilterWhere(['like', 'vat_charge', $this->vat_charge])
            ->andFilterWhere(['like', 'discount', $this->discount])
            ->andFilterWhere(['like', 'net_amount', $this->net_amount]);

        return $dataProvider;
    }
}
