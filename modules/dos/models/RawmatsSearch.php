<?php

namespace app\modules\dos\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\dos\models\Rawmats;

/**
 * RawmatsSearch represents the model behind the search form of `app\modules\dos\models\Rawmats`.
 */
class RawmatsSearch extends Rawmats
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'category', 'status', 'created_by', 'updated_by'], 'integer'],
            [['numbers', 'title', 'description', 'rawmat_name', 'supplier_name', 'docs', 'expiration_date', 'status_details', 'ref', 'created_at', 'updated_at'], 'safe'],
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
        $query = Rawmats::find();

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
            ->andFilterWhere(['like', 'rawmat_name', $this->rawmat_name])
            ->andFilterWhere(['like', 'supplier_name', $this->supplier_name])
            ->andFilterWhere(['like', 'docs', $this->docs])
            ->andFilterWhere(['like', 'status_details', $this->status_details])
            ->andFilterWhere(['like', 'ref', $this->ref]);

        return $dataProvider;
    }
}
