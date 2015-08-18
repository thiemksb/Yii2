<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\models\Categories;

class CategoryController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'edit', 'delete'],
                'rules' => [
                    [
                        'allow' => false,
                        'actions' => ['login'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['create', 'edit', 'delete'],
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
        $lst = Categories::find()
            ->where([RECORD_STATUS => STATUS_NORMAL])
            ->orderBy(NAME)
            ->all();

        return $this->render('index', ['lst' => $lst]);
    }

    public function actionCreate()
    {
       $model = new Categories();
        if ($model->load(Yii::$app->request->post())) {
            if($model->validate()){

                $model->save();
                $id = $model->id;
                $model->file = UploadedFile::getInstance($model, 'file');
                if($model->file){
                    $id = $model->id;
                    $imageName = "category_".$id.'_'.getdate()[0];
                    $model->file->saveAs('uploads/'.$imageName.'.'.$model->file->extension);

                    $station = Categories::findOne($id);
                    $station->image = '@web/uploads/'.$imageName.'.'.$model->file->extension;
                    $station->save();
                }
                return $this->redirect(['index']);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
	}

    public function actionDelete($id)
    {

        $model = Categories::findOne($id);
        if(!empty($model)){
            $model->record_status =STATUS_DELETED;
            if($model->save()) 
			return $this->redirect('index');
        }
    }
	public function actionEdit($id)
	{
        $model = Categories::findOne($id);
		
        if ($model->load(Yii::$app->request->post())) {
			$model->file = UploadedFile::getInstance($model, 'file');
            if ($model->file && $model->validate()) {
                $model->file->saveAs('uploads/news_'.$model->id.'_'.getdate()[0] . '.' . $model->file->extension);
                $model->image = '@web/uploads/news_'.$model->id.'_'.getdate()[0].'.'.$model->file->extension;
                $model->save();
                return $this->redirect('index');
            }
        } else {

            return $this->render('edit', [
                'model' => $model,
            ]);
        }
    }
}
