<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pollution".
 *
 * @property int $pollution_id
 * @property string $pollution_type
 * @property int $pollution_src
 * @property string $pollution_date
 * @property int|null $region_id
 *
 * @property Region $region
 */
class Pollution extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pollution';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pollution_type', 'pollution_src'], 'required'],
            [['pollution_type'], 'string'],
            [['pollution_src', 'region_id'], 'integer'],
            [['pollution_date'], 'safe'],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Region::class, 'targetAttribute' => ['region_id' => 'region_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pollution_id' => 'Pollution ID',
            'pollution_type' => 'Pollution Type',
            'pollution_src' => 'Pollution Src',
            'pollution_date' => 'Pollution Date',
            'region_id' => 'Region ID',
        ];
    }

    /**
     * Gets query for [[Region]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Region::class, ['region_id' => 'region_id']);
    }
}
