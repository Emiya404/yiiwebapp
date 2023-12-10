<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "region".
 *
 * @property int $region_id
 * @property string $region_code
 * @property string $region_name
 *
 * @property Pollution[] $pollutions
 */
class Region extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'region';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['region_code', 'region_name'], 'required'],
            [['region_code'], 'string', 'max' => 10],
            [['region_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'region_id' => 'Region ID',
            'region_code' => 'Region Code',
            'region_name' => 'Region Name',
        ];
    }

    /**
     * Gets query for [[Pollutions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPollutions()
    {
        return $this->hasMany(Pollution::class, ['region_id' => 'region_id']);
    }
}
