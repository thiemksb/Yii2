<?php

namespace app\controllers;

use Yii;

use app\models\User;
use app\models\Stations;
use yii\base\Exception;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Lines;
use app\models\Companies;
use app\models\Vehicles;
use yii\web\UploadedFile;
use app\models\VehicleForm;

class VehicleController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['login', 'logout', 'create', 'edit', 'delete'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout', 'create', 'edit', 'delete'],
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $lst = Vehicles::find()
            ->where([RECORD_STATUS => STATUS_NORMAL])
            ->all();
        return $this->render('index', ['listvir' => $lst]);
    }

    public function actionCreate()
    {
		$lstLine = Lines::find()->where([RECORD_STATUS => STATUS_NORMAL])->all();
		$lstcompany = Companies::find()->where([RECORD_STATUS => STATUS_NORMAL])->all();
		$lstuser = User::find()->where([RECORD_STATUS => STATUS_NORMAL])->all();
        $model = new Vehicles();
        if ($model->load(Yii::$app->request->post())) {
            $id = $model->create();
            $imageName = "vehicle_".$id;
			
            $model->file = UploadedFile::getInstance($model, 'file');
			if(!empty($model->file)){
			$model->file->saveAs('uploads/'.$imageName.'.'.$model->file->extension);
            $line = Vehicles::findOne($id);
            $line->image = '@web/uploads/'.$imageName.'.'.$model->file->extension;
            $line->save();
			}else{

            $line = Vehicles::findOne($id);
            $line->save();
			}
            return $this->redirect('index');
        } else {
            return $this->render('create', [
                'model' => $model,
				'lstline' => $lstLine,
				'lstcompany' => $lstcompany,
				'lstuser' => $lstuser,
            ]);
        }
    }

    public function actionEdit($id)
    {
		$lstline = Lines::find()->where([RECORD_STATUS => STATUS_NORMAL])->all();
		$lstcompany = Companies::find()->where([RECORD_STATUS => STATUS_NORMAL])->all();
		$lstuser = User::find()->where([RECORD_STATUS => STATUS_NORMAL])->all();
        $model = Vehicles::findOne($id);
        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');

            if ($model->file && $model->validate()) {

                $model->file->saveAs('uploads/vehicle_'.$model->id.'_'.getdate()[0] . '.' . $model->file->extension);
                $model->image = '@web/uploads/vehicle_'.$model->id.'_'.getdate()[0].'.'.$model->file->extension;
                $model->save();
                return $this->redirect('index');
            }
        } else {

            return $this->render('edit', [
                'model' => $model,
				'lstline'=>$lstline,
				'lstcompany'=>$lstcompany,
				'lstuser'=>$lstuser,
            ]);
        }
    }
    public function actionDelete($id)
    {

        $model = Vehicles::findOne($id);
        if(!empty($model)){
            $model->record_status = STATUS_DELETED;
            if($model->save()) return $this->redirect('index');
        }
    }

}
