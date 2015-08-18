<?php

namespace app\models;

use Yii;

class Stations extends \yii\db\ActiveRecord
{
    public $file;
    public static function tableName()
    {
        return 'stations';
    }
    public function rules()
    {
        return [
            [['name', 'line_id'], 'required'],
            [['id', 'line_id', 'record_status'], 'integer'],
            [['description'], 'string'],
            [['name', 'image'], 'string', 'max' => 255],
            ['file', 'file']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
			'image' => 'Image',
            'file' => 'Image',
            'record_status' => 'Record Status',
            'id' => 'ID',
            'line_id' => 'Line',
            'name' => 'Station Name',
            'description' => 'Description',
           
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLine()
    {
        return $this->hasOne(Lines::className(), ['id' => 'line_id']);
    }
}
