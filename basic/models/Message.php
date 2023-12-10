<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "message".
 *
 * @property int $msg_id
 * @property int|null $send_uid
 * @property int|null $recv_uid
 * @property string $msg_time
 * @property int|null $msg_read
 * @property string|null $msg_text
 */
class Message extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'message';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['send_uid', 'recv_uid', 'msg_read'], 'integer'],
            [['msg_time'], 'safe'],
            [['msg_text'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'msg_id' => 'Msg ID',
            'send_uid' => 'Send Uid',
            'recv_uid' => 'Recv Uid',
            'msg_time' => 'Msg Time',
            'msg_read' => 'Msg Read',
            'msg_text' => 'Msg Text',
        ];
    }
}
