<?php

namespace app\modules\sauce\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\sauce\models\MoromiListMemo;

/**
 * MoromiListMemoSearch represents the model behind the search form of `app\modules\sauce\models\MoromiListMemo`.
 */
class MoromiListMemoSearch extends MoromiListMemo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'active'], 'integer'],
            [['name', 'detail', 'color'], 'safe'],
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
        $query = MoromiListMemo::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            // เรียงล่าสุดก่อน จาก id
            'pagination' => [
                'pageSize' => 12,
            ],
            'sort' => ['defaultOrder' => [
                'id' => SORT_DESC,
            ]]
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
            'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'detail', $this->detail])
            ->andFilterWhere(['like', 'color', $this->color]);

        return $dataProvider;
    }
}
