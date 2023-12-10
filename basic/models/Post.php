<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property int $post_id
 * @property int|null $post_author
 * @property string $post_title
 * @property int|null $post_type
 * @property string|null $post_text
 * @property string $post_time
 * @property string|null $post_image
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['post_author', 'post_type'], 'integer'],
            [['post_title'], 'required'],
            [['post_text'], 'string'],
            [['post_time'], 'safe'],
            [['post_title', 'post_image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'post_id' => 'Post ID',
            'post_author' => 'Post Author',
            'post_title' => 'Post Title',
            'post_type' => 'Post Type',
            'post_text' => 'Post Text',
            'post_time' => 'Post Time',
            'post_image' => 'Post Image',
        ];
    }
}
