<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "suggestion".
 *
 * @property int $suggestion_id
 * @property int|null $suggestion_user
 * @property string|null $suggestion_text
 * @property string $suggestion_time
 */
class Suggestion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'suggestion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['suggestion_user'], 'integer'],
            [['suggestion_text'], 'string'],
            [['suggestion_time'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'suggestion_id' => 'Suggestion ID',
            'suggestion_user' => 'Suggestion User',
            'suggestion_text' => 'Suggestion Text',
            'suggestion_time' => 'Suggestion Time',
        ];
    }
}
