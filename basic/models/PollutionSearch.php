<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pollution;

/**
 * PollutionSearch represents the model behind the search form of `app\models\Pollution`.
 */
class PollutionSearch extends Pollution
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pollution_id', 'pollution_src', 'region_id'], 'integer'],
            [['pollution_type', 'pollution_date'], 'safe'],
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
        $query = Pollution::find();

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
            'pollution_id' => $this->pollution_id,
            'pollution_src' => $this->pollution_src,
            'pollution_date' => $this->pollution_date,
            'region_id' => $this->region_id,
        ]);

        $query->andFilterWhere(['like', 'pollution_type', $this->pollution_type]);

        return $dataProvider;
    }
}
