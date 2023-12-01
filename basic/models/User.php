<?php

namespace app\models;

use Yii;

use function PHPUnit\Framework\isEmpty;

/**
 * This is the model class for table "user".
 *
 * @property int $user_id
 * @property string $username
 * @property string $password
 * @property string $authKey
 * @property string $accessToken
 * @property string|null $phone_number
 * @property string $user_status
 * @property string $user_type
 *
 * @property BlogPost[] $blogPosts
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface{
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
            [['username', 'password', 'authKey', 'accessToken', 'user_status', 'user_type'], 'required'],
            [['user_status', 'user_type'], 'string'],
            [['username', 'password', 'authKey', 'accessToken'], 'string', 'max' => 255],
            [['phone_number'], 'string', 'max' => 15],
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
            'phone_number' => 'Phone Number',
            'user_status' => 'User Status',
            'user_type' => 'User Type',
        ];
    }

    /**
     * Gets query for [[BlogPosts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBlogPosts()
    {
        return $this->hasMany(BlogPost::class, ['author_id' => 'user_id']);
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
}
