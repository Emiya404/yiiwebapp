<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property int $comment_id
 * @property int $user_id
 * @property string $comment_text
 * @property string $creation_date
 * @property int|null $parent_comment_id
 *
 * @property User $user
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'comment_text'], 'required'],
            [['user_id', 'parent_comment_id'], 'integer'],
            [['comment_text'], 'string'],
            [['creation_date'], 'safe'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'user_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'comment_id' => 'Comment ID',
            'user_id' => 'User ID',
            'comment_text' => 'Comment Text',
            'creation_date' => 'Creation Date',
            'parent_comment_id' => 'Parent Comment ID',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['user_id' => 'user_id']);
    }
}
