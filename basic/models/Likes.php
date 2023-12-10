<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "likes".
 *
 * @property int $like_post
 * @property int $like_user
 * @property string $like_time
 */
class Likes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'likes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['like_post', 'like_user'], 'required'],
            [['like_post', 'like_user'], 'integer'],
            [['like_time'], 'safe'],
            [['like_post', 'like_user'], 'unique', 'targetAttribute' => ['like_post', 'like_user']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'like_post' => 'Like Post',
            'like_user' => 'Like User',
            'like_time' => 'Like Time',
        ];
    }
}
