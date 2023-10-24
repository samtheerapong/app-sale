<?php

namespace app\modules\salers\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\salers\models\PaidStatus;

/**
 * PaidStatusSearch represents the model behind the search form of `app\modules\salers\models\PaidStatus`.
 */
class PaidStatusSearch extends PaidStatus
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['paid_status', 'color'], 'safe'],
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
        $query = PaidStatus::find();

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
        ]);

        $query->andFilterWhere(['like', 'paid_status', $this->paid_status])
            ->andFilterWhere(['like', 'color', $this->color]);

        return $dataProvider;
    }
}
