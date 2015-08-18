<?php

namespace app\models;

use Yii;

class Vehicles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	public $file;
    public static function tableName()
    {
        return 'vehicles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_id', 'line_id', 'user_id', 'vehicle_type_id', 'record_status'], 'integer'],
            [['license_plate', 'image'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_id' => 'Tên công ty',
            'line_id' => 'Tên đường',
            'user_id' => 'Người lái',
            'vehicle_type_id' => 'Loại xe',
            'license_plate' => 'License Plate',
            'image' => 'Image',
            'record_status' => 'Record Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Companies::className(), ['id' => 'company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLine()
    {
        return $this->hasOne(Lines::className(), ['id' => 'line_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleType()
    {
        return $this->hasOne(VehicleType::className(), ['id' => 'vehicle_type_id']);
    }
}
