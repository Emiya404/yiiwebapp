<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Likes;

/**
 * LikesSearch represents the model behind the search form of `app\models\Likes`.
 */
class LikesSearch extends Likes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['like_post', 'like_user'], 'integer'],
            [['like_time'], 'safe'],
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
        $query = Likes::find();

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
            'like_post' => $this->like_post,
            'like_user' => $this->like_user,
            'like_time' => $this->like_time,
        ]);

        return $dataProvider;
    }
}
