<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bookmark".
 *
 * @property int $mark_id
 * @property string $mark_name
 * @property int|null $mark_user
 *
 * @property User $markUser
 */
class Bookmark extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bookmark';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mark_name'], 'required'],
            [['mark_user'], 'integer'],
            [['mark_name'], 'string', 'max' => 255],
            [['mark_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['mark_user' => 'user_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'mark_id' => 'Mark ID',
            'mark_name' => 'Mark Name',
            'mark_user' => 'Mark User',
        ];
    }

    /**
     * Gets query for [[MarkUser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMarkUser()
    {
        return $this->hasOne(User::class, ['user_id' => 'mark_user']);
    }

    public function getMarkrecord()
    {
        return $this->hasMany(Markrecord::class,['mark_id'=>'mark_id']);
    }
}
