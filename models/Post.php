<?php

namespace app\models;

use Yii;

class Post extends \yii\db\ActiveRecord
{
    public $file;
    public static function tableName()
    {
        return 'post_news';
    }
    public function rules()
    {
        return [
            [['title', 'cat_id'], 'required'],
            [['id', 'cat_id', 'record_status'], 'integer'],
            [['des','content'], 'string'],
            [['title', 'img','author',], 'string', 'max' => 255],
			[['time'],'date', 'format'=>'yyy-m-d'],
            ['file', 'file']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
			'img' => 'Image',
            'file' => 'Image',
            'record_status' => 'Record Status',
            'id' => 'ID',
            'cat_id' => 'Thể loại tin tức',
            'title' => 'Tiêu đề',
            'des' => 'Mô tả',
            'content' => 'Nội dung',
            'author' => 'Tác giả',
			'time'=>'Giờ viết',
			
           
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCat()
    {
        return $this->hasOne(Categories::className(), ['id' => 'cat_id']);
    }
}
