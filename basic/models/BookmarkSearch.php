<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Bookmark;

/**
 * BookmarkSearch represents the model behind the search form of `app\models\Bookmark`.
 */
class BookmarkSearch extends Bookmark
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mark_id', 'mark_user'], 'integer'],
            [['mark_name'], 'safe'],
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
        $query = Bookmark::find();

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
            'mark_id' => $this->mark_id,
            'mark_user' => $this->mark_user,
        ]);

        $query->andFilterWhere(['like', 'mark_name', $this->mark_name]);

        return $dataProvider;
    }
}
