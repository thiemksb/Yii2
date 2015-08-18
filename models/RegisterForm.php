<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
class RegisterForm extends Model
{
    public $account;
    public $password;
	public $confirmPassword;
	public $record_status=1;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['account', 'password','confirmPassword'], 'required'],
            [['confirmPassword'], 'compare', 'compareAttribute'=>'password', 'operator'=>'=='],
			['account','email'],
			[['password','confirmPassword'],'string','max'=>128]
        ];
    }
	public function attributeLabels(){
		return[
			'password'=>'Mật khẩu',
			'account'=>'Emai dang nhap',
			'confirmPassword'=>'Xac nhan mat khau',
		];
	}
    public function register()
    {
        if ($this->validate()) {
            try{
				$user = new User();
				$user->username=$this->account;
				$user->password=sha1($this->password);
				$user->record_status= $this->record_status;
				$user->save();
				return true;
			}catch(Exception $e){
				return false;
			}
        }
    }

}
