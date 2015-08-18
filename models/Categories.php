<?php

namespace app\models;

use Yii;

class Categories extends \yii\db\ActiveRecord
{
    public $file;
    public static function tableName()
    {
        return 'cat_news';
    }
    public function rules()
    {
        return [
             [['name'], 'required'],
            [['id', 'record_status'], 'integer'],
            [['des'], 'string'],
            [['name', 'image'], 'string', 'max' => 255],
            ['file', 'file'],
			['created_date', 'date', 'format' => 'yyyy-M-d'] 
        ];
	}
	

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
			'name'=>'Tên category',
			'des'=>'Mô tả',
			'created_date'=>'Ngày tạo',
			'image'=>'Ảnh',
			'file' => 'Image',
			'record_status' => 'Record Status',
			'id'=>'id', 
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasMany(Post::className(), ['cat_id' => 'id']);
    }
}
