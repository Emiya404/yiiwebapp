<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $user_id
 * @property string $username
 * @property string $password
 * @property string $authKey
 * @property string $accessToken
 * @property string $user_type
 *
 * @property Bookmark[] $bookmarks
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'authKey', 'accessToken', 'user_type'], 'required'],
            [['user_type'], 'string'],
            [['username', 'password', 'authKey', 'accessToken'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'username' => 'Username',
            'password' => 'Password',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
            'user_type' => 'User Type',
        ];
    }

    /**
     * Gets query for [[Bookmarks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookmarks()
    {
        return $this->hasMany(Bookmark::class, ['mark_user' => 'user_id']);
    }

     /**
     * {@inheritdoc}
     */
    public static function findIdentity($id){
        $user=User::findOne(['user_id'=>$id]);
        if($user==null){
            return null;
        }
        return new static($user);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        $user=User::findOne(['accessToken'=>$token]);
        if($user==null){
            return null;
        }
        return new static($user);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        $user=User::findOne(['username'=>$username]);
        if($user==null){
            return null;
        }
        return new static($user);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->user_id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    public function getSendmessages(){
        return $this->hasMany(Message::class,['send_uid'=>'user_id']);
    }
    public function getRecvedmessages(){
        return $this->hasMany(Message::class,['recv_uid'=>'user_id']);
    }

    public function getPosts(){
        return $this->hasMany(Post::class,['post_author'=>'user_id']);
    }
    public function getComments(){
        return $this->hasMany(Comment::class,['comment_user'=>'user_id']);
    }
    public function getLikes(){
        return $this->hasMany(Likes::class,['like_user'=>'user_id']);
    }

    public static function deleteUserWithOther($user_id){
        $user=User::findOne(['user_id'=>$user_id]);
        foreach($user->posts as $post){
            Post::deletePoatWithOther($post->post_id);
        }
        foreach($user->comments as $comment){
            Comment::findOne(['comment_id'=>$comment->comment_id])->delete();
        }
        foreach($user->likes as $like){
            Likes::findOne(['like_post'=>$like->like_post,'like_user'=>$like->like_user])->delete();
        }
        foreach($user->bookmarks as $bookmark){
            foreach($bookmark->markrecord as $markrecord){
                Markrecord::findOne(['mark_id'=>$markrecord->mark_id,'post_id'=>$markrecord->post_id])->delete();
            }
            Bookmark::findOne(['mark_id'=>$bookmark->mark_id])->delete();
        }
        User::findOne(['user_id'=>$user_id])->delete();
        return;
    }
}
