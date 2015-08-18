<?php

namespace app\controllers;

use app\models\LineForm;
use app\models\companies;
use Yii;
use yii\base\Exception;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Lines;
use yii\web\UploadedFile;

class CompanyController extends Controller
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
        $lst = companies::find()
            ->where([RECORD_STATUS => STATUS_NORMAL])
            ->orderBy(NAME)
            ->all();
        return $this->render('index', ['listLine' => $lst]);
    }

    public function actionCreate()
    {
        $model = new LineForm();
        if ($model->load(Yii::$app->request->post())) {
            $id = $model->create();
            $imageName = "line_".$id;
			
            $model->file = UploadedFile::getInstance($model, 'file');
			if(!empty($model->file)){
			$model->file->saveAs('uploads/'.$imageName.'.'.$model->file->extension);
            $line = Lines::findOne($id);
            $line->image = '@web/uploads/'.$imageName.'.'.$model->file->extension;
            $line->save();
			}else{

            $line = Lines::findOne($id);
            $line->save();
			}
            return $this->redirect('index');
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionEdit($id)
    {
        $model = Lines::findOne($id);


        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');

            if ($model->file && $model->validate()) {

                $model->file->saveAs('uploads/line_'.$model->id.'_'.getdate()[0] . '.' . $model->file->extension);
                $model->image = '@web/uploads/line_'.$model->id.'_'.getdate()[0].'.'.$model->file->extension;
                $model->save();
                return $this->redirect('../../line/index');
            }
        } else {

            return $this->render('edit', [
                'model' => $model,
            ]);
        }
    }
    public function actionDelete($id)
    {

        $model = companies::findOne($id);
        if(!empty($model)){
            $model->record_status = STATUS_DELETED;
            if($model->save()) return $this->redirect('index');
        }
    }

}
