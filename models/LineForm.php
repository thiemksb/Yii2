<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class LineForm extends Model
{
    public $id;
    public $name;
    public $description;
    public $start_time;
    public $end_time;
    public $image;
    public $file;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['name', 'start_time', 'end_time' ], 'required'],
            [['description', 'image'], 'string'],
            // email has to be a valid email address
            [['start_time', 'end_time'], 'date', 'format' => 'H:m'],
            // verifyCode needs to be entered correctly
            ['file', 'file'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Line name',
            'description' => 'Description',
            'start_time' => 'Start time',
            'End_time' => 'End time',
            'image' => 'Image',
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
            $model = new Lines();
            $model->name = $this->name;
            $model->image = $this->image;
            $model->description = $this->description;
            $model->start_time = $this->start_time;
            $model->end_time = $this->end_time;
            $model->save();
            return $model->id;
        } else {
            return false;
        }
    }
}
