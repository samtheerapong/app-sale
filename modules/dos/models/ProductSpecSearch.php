<?php

namespace app\modules\dos\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\dos\models\ProductSpec;

/**
 * ProductSpecSearch represents the model behind the search form of `backend\modules\product\models\ProductSpec`.
 */
class ProductSpecSearch extends ProductSpec
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'revision', 'product_status'], 'integer'],
            [[
                'title',
                'product_number',
                'revised_date',
                'spec',
                'spec_expiration',
                'process',
                'process_expiration',
                'fda',
                'fda_expiration',
                'nutrition',
                'nutrition_expiration',
                'created_at',
                'updated_at',
                'created_by',
                'updated_by',
                'iso',
            ], 'safe'],
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
        $query = ProductSpec::find();

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
            'revision' => $this->revision,
            'product_status' => $this->product_status,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'product_number', $this->product_number])
            ->andFilterWhere(['like', 'revised_date', $this->revised_date])
            ->andFilterWhere(['like', 'iso', $this->iso])
            ->andFilterWhere(['like', 'spec', $this->spec])
            ->andFilterWhere(['like', 'spec_expiration', $this->spec_expiration])
            ->andFilterWhere(['like', 'process', $this->process])
            ->andFilterWhere(['like', 'process_expiration', $this->product_number])
            ->andFilterWhere(['like', 'fda', $this->fda])
            ->andFilterWhere(['like', 'fda_expiration', $this->fda_expiration])
            ->andFilterWhere(['like', 'nutrition', $this->nutrition])
            ->andFilterWhere(['like', 'nutrition_expiration', $this->nutrition_expiration])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by]);

        return $dataProvider;
    }
}
