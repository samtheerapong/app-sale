<?php

namespace app\modules\salers\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\salers\models\Saleorder;

/**
 * SaleorderSearch represents the model behind the search form of `app\modules\salers\models\Saleorder`.
 */
class SaleorderSearch extends Saleorder
{

    public $year;
    public $month;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'customer_id', 'salers_id', 'payment_id', 'status_id'], 'integer'],
            [['po_number', 'deadline', 'new_deadline', 'remask'], 'safe'],
            [['percent_vat', 'discount', 'total', 'grand_total'], 'number'],
            [['year', 'month'], 'integer'],
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
        $query = Saleorder::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC, // เรียงจาก id ล่าสุดก่อน
                ],
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        // Filter by year and month
        if ($this->year) {
            $query->andWhere(['YEAR(deadline)' => $this->year]);
        }

        if ($this->month) {
            $query->andWhere(['MONTH(deadline)' => $this->month]);
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'customer_id' => $this->customer_id,
            'salers_id' => $this->salers_id,
            'deadline' => $this->deadline,
            'new_deadline' => $this->new_deadline,
            'payment_id' => $this->payment_id,
            'percent_vat' => $this->percent_vat,
            'discount' => $this->discount,
            'total' => $this->total,
            'grand_total' => $this->grand_total,
            'status_id' => $this->status_id,
        ]);

        $query->andFilterWhere(['like', 'po_number', $this->po_number])
            ->andFilterWhere(['like', 'remask', $this->remask]);

        return $dataProvider;
    }
}
