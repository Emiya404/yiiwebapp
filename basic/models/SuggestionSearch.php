<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Suggestion;

/**
 * SuggestionSearch represents the model behind the search form of `app\models\Suggestion`.
 */
class SuggestionSearch extends Suggestion
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['suggestion_id', 'suggestion_user'], 'integer'],
            [['suggestion_text', 'suggestion_time'], 'safe'],
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
        $query = Suggestion::find();

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
            'suggestion_id' => $this->suggestion_id,
            'suggestion_user' => $this->suggestion_user,
            'suggestion_time' => $this->suggestion_time,
        ]);

        $query->andFilterWhere(['like', 'suggestion_text', $this->suggestion_text]);

        return $dataProvider;
    }
}
