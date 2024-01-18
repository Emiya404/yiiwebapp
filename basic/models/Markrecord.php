<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "markrecord".
 *
 * @property int $mark_id
 * @property int $post_id
 */
class Markrecord extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'markrecord';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mark_id', 'post_id'], 'required'],
            [['mark_id', 'post_id'], 'integer'],
            [['mark_id', 'post_id'], 'unique', 'targetAttribute' => ['mark_id', 'post_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'mark_id' => 'Mark ID',
            'post_id' => 'Post ID',
        ];
    }

    public function getBookmark(){
        return $this->hasOne(Bookmark::class,['mark_id'=>'mark_id']);
    }
}
