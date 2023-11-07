<?php

namespace app\modules\engineer\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\engineer\models\RequestRepair;

/**
 * RequestRepairSearch represents the model behind the search form of `app\modules\engineer\models\RequestRepair`.
 */
class RequestRepairSearch extends RequestRepair
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created_by', 'updated_by', 'priority', 'urgency', 'locations_id', 'approver', 'job_status_id'], 'integer'],
            [['repair_code', 'created_at', 'updated_at', 'created_date', 'request_department', 'request_title', 'request_detail', 'request_date', 'broken_date', 'remask', 'docs', 'approve_date', 'approve_comment', 'ref'], 'safe'],
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
        $query = RequestRepair::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC, // เรียงลำดับตามคอลัมน์ "id" ล่าสุดขึ้นก่อน
                ],
            ],
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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'priority' => $this->priority,
            'urgency' => $this->urgency,
            'created_date' => $this->created_date,
            'request_date' => $this->request_date,
            'broken_date' => $this->broken_date,
            'locations_id' => $this->locations_id,
            'approver' => $this->approver,
            'approve_date' => $this->approve_date,
            'job_status_id' => $this->job_status_id,
        ]);

        $query->andFilterWhere(['like', 'repair_code', $this->repair_code])
            ->andFilterWhere(['like', 'request_department', $this->request_department])
            ->andFilterWhere(['like', 'request_title', $this->request_title])
            ->andFilterWhere(['like', 'request_detail', $this->request_detail])
            ->andFilterWhere(['like', 'remask', $this->remask])
            ->andFilterWhere(['like', 'docs', $this->docs])
            ->andFilterWhere(['like', 'approve_comment', $this->approve_comment])
            ->andFilterWhere(['like', 'ref', $this->ref]);

        return $dataProvider;
    }
}
