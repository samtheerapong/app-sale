<?php

namespace app\modules\sauce\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\sauce\models\RawSauce;

/**
 * RawSauceSearch represents the model behind the search form of `app\modules\sauce\models\RawSauce`.
 */
class RawSauce2Search extends RawSauce
{
    public $reccord_date_start; // Add this property
    public $reccord_date_end;   // Add this property
    public $year;
    public $month;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'tank_id', 'type_id', 'created_by', 'updated_by'], 'integer'],
            [['year', 'month'], 'integer'],
            [['batch', 'reccord_date', 'remask', 'created_at', 'updated_at'], 'safe'],
            [['ph', 'nacl_t1', 'nacl_t2', 'nacl_t_avr', 'nacl_p1', 'nacl_p2', 'nacl_p_avr', 'tn_t1', 'th_t2', 'tn_t_avr', 'tn_p1', 'tn_p2', 'tn_p_avr', 'col', 'alc_t', 'alc_p', 'ppm', 'brix'], 'number'],
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
        $query = RawSauce::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 12, // Set the number of items per page to 12
            ],
            'sort' => [
                'defaultOrder' => [
                    'tank_id' => SORT_ASC, // Ascending order for tank_id
                    'type_id' => SORT_ASC, // Ascending order for type_id
                    'reccord_date' => SORT_DESC, // Descending order for record_date
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
            $query->andWhere(['YEAR(reccord_date)' => $this->year]);
        }

        if ($this->month) {
            $query->andWhere(['MONTH(reccord_date)' => $this->month]);
        }
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            // 'reccord_date' => $this->reccord_date,
            'tank_id' => $this->tank_id,
            'type_id' => $this->type_id,
            'ph' => $this->ph,
            'nacl_t1' => $this->nacl_t1,
            'nacl_t2' => $this->nacl_t2,
            'nacl_t_avr' => $this->nacl_t_avr,
            'nacl_p1' => $this->nacl_p1,
            'nacl_p2' => $this->nacl_p2,
            'nacl_p_avr' => $this->nacl_p_avr,
            'tn_t1' => $this->tn_t1,
            'th_t2' => $this->th_t2,
            'tn_t_avr' => $this->tn_t_avr,
            'tn_p1' => $this->tn_p1,
            'tn_p2' => $this->tn_p2,
            'tn_p_avr' => $this->tn_p_avr,
            'col' => $this->col,
            'alc_t' => $this->alc_t,
            'alc_p' => $this->alc_p,
            'ppm' => $this->ppm,
            'brix' => $this->brix,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'batch', $this->batch])
            ->andFilterWhere(['like', 'reccord_date', $this->reccord_date])
            ->andFilterWhere(['like', 'remask', $this->remask]);

        // $query->andFilterWhere(['between', 'reccord_date', $this->reccord_date_start, $this->reccord_date_end]);

        return $dataProvider;
    }
}
