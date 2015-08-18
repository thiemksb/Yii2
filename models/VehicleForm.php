<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class VehicleForm extends Model
{
    public $id,$name,$line_id,$description,$image,$file;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [[ 'name', 'line_id','image','company_id','user_id','vehicle_type_id' ], 'required'],
            ['file', 'file'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Tên xe',
            'image' => 'Image',
			'company_id' => 'Công ty',
			'line_id' => 'Tuyến Đường',
			'user_id' => 'Người Lái',
			'vehicle_type_id' => 'Loại xe',
            'file' => 'Image',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param  string  $email the target email address
     * @return boolean whether the model passes validation
     */
    public function create()
    {
        if ($this->validate()) {
            $model = new Vehicles();
            $model->name = $this->name;
            $model->image = $this->image;
			$model->line_id = $this->line_id;
			$model->company_id = $this->company_id;
			$model->user_id = $this->user_id;
			$model->vihicle_id = $this->vehicle_id;
            $model->save();
            return $model->id;
        } else {
            return false;
        }
    }
}
