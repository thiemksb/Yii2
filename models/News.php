<?php

namespace app\models;

use Yii;

class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	public $file;
	
    public static function tableName()
    {
        return 'post_news';
    }
	 public function rules()
    {
        return [
            [['title'], 'required'],
            [['id','cat_id', 'record_status'], 'integer'],
            [['des','content'], 'string'],
            [['title', 'img','author'], 'string', 'max' => 255],
            ['file', 'file'],
			[['time'], 'date', 'format' => 'yyyy-M-d']

        ];
    }
	public function attributeLabels()
    {
        return [
			'title'=>'Tên Tin tức',
			'des'=>'Mô tả',
			'time'=>'Giờ tạo',
			'img'=>'Ảnh',
			'file' => 'Image',
			'author'=>'Tác giả',
			'content'=>'Nội dung',
			'record_status' => 'Record Status',
			'id'=>'id',
			'cat_id'=>'Thể loại',
        ];
    }
	public function getCat()
    {
        return $this->hasOne(Categories::className(), ['id' => 'cat_id']);
    }
}
	

