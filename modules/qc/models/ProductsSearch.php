<?php

namespace backend\modules\qc\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\qc\models\Products;

/**
 * ProductsSearch represents the model behind the search form of `backend\modules\qc\models\Products`.
 */
class ProductsSearch extends Products
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'category', 'revision', 'status', 'created_by', 'updated_by'], 'integer'],
            [['numbers', 'title', 'description', 'product_name', 'reviesed_date', 'product_iso', 'docs', 'expiration_date', 'status_details', 'ref', 'created_at', 'updated_at'], 'safe'],
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
        $query = Products::find();

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
            'category' => $this->category,
            'revision' => $this->revision,
            'reviesed_date' => $this->reviesed_date,
            'expiration_date' => $this->expiration_date,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'numbers', $this->numbers])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'product_name', $this->product_name])
            ->andFilterWhere(['like', 'product_iso', $this->product_iso])
            ->andFilterWhere(['like', 'docs', $this->docs])
            ->andFilterWhere(['like', 'status_details', $this->status_details])
            ->andFilterWhere(['like', 'ref', $this->ref]);

        return $dataProvider;
    }
}
