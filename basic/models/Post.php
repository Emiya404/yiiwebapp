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

    public function getUser(){
        return $this->hasOne(User::class,['user_id'=>'post_author']);
    }

    public function getComments(){
        return $this->hasMany(Comment::class,['comment_post'=>'post_id']);
    }
    public function getLikes(){
        return $this->hasMany(Likes::class,['like_post'=>'post_id']);
    }
    public function getMarkrecords(){
        return $this->hasMany(Markrecord::class,['post_id'=>'post_id']);
    }

    public static function deletePoatWithOther($post_id){
        $post=Post::findOne(['post_id'=>$post_id]);
        if(Post::findOne(['post_id'=>$post_id])->delete()){
            foreach($post->comments as $comment){
                Comment::findOne(['comment_id'=>$comment->comment_id])->delete();
            }
            foreach($post->likes as $like){
                Likes::findOne(['like_post'=>$like->like_post,'like_user'=>$like->like_user])->delete();
            }
            foreach($post->markrecords as $markrecord){
                Markrecord::findOne(['mark_id'=>$markrecord->mark_id,'post_id'=>$markrecord->post_id])->delete();
            }
        }
    }
}
