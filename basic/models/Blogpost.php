<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "blog_post".
 *
 * @property int $post_id
 * @property string $title
 * @property string|null $content
 * @property int $author_id
 *
 * @property User $author
 */
class Blogpost extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blog_post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'author_id'], 'required'],
            [['content'], 'string'],
            [['author_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['author_id' => 'user_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'post_id' => 'Post ID',
            'title' => 'Title',
            'content' => 'Content',
            'author_id' => 'Author ID',
        ];
    }

    /**
     * Gets query for [[Author]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::class, ['user_id' => 'author_id']);
    }
}
