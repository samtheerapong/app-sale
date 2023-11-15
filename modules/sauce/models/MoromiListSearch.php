<?php

namespace app\modules\sauce\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\sauce\models\MoromiList;

/**
 * MoromiListSearch represents the model behind the search form of `app\modules\sauce\models\MoromiList`.
 */
class MoromiListSearch extends MoromiList
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'moromi_id', 'memo_list', 'color'], 'integer'],
            [['record_date', 'note'], 'safe'],
            [['ph', 'nacl', 'tn', 'alcohol', 'turbidity'], 'number'],
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
        $query = MoromiList::find();

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
            'moromi_id' => $this->moromi_id,
            'record_date' => $this->record_date,
            'memo_list' => $this->memo_list,
            'ph' => $this->ph,
            'color' => $this->color,
            'nacl' => $this->nacl,
            'tn' => $this->tn,
            'alcohol' => $this->alcohol,
            'turbidity' => $this->turbidity,
        ]);

        $query->andFilterWhere(['like', 'note', $this->note]);

        return $dataProvider;
    }
}
