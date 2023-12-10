<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property int $comment_id
 * @property int|null $comment_post
 * @property int|null $comment_user
 * @property string|null $comment_text
 * @property string $comment_time
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['comment_post', 'comment_user'], 'integer'],
            [['comment_text'], 'string'],
            [['comment_time'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'comment_id' => 'Comment ID',
            'comment_post' => 'Comment Post',
            'comment_user' => 'Comment User',
            'comment_text' => 'Comment Text',
            'comment_time' => 'Comment Time',
        ];
    }
}
