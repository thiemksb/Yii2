<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Detail;
use app\models\News;
use yii\web\UploadedFile;

class DetailController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
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
    public function actionIndex($id=null)
	{
		
		if ($id == null) {
			$model= new Detail;
			$model=Detail::find()->where(['record_status'=>1])->all();
			return $this->render('index',['model'=>$model]);
		} else {
			$model= new Detail;
			$model=Detail::find()->where(['record_status'=>1,'cat_id'=>$id])->all();
			return $this->render('index',['model'=>$model]);
		}
			
	}
	public function actionView($id)
    {
		$model= new Detail;
		$model=Detail::find($id)->where(['record_status'=>1,'id'=>$id])->all();
        return $this->render('view',['model'=>$model]);
    }
	
	
	public function actionDelete($id){
		$model= new Detail;
		$model=Detail::findOne($id);
		if(!empty($model)){
			$model->record_status=0;
		}
		if($model->save())
		return $this->redirect('index');
	}
	

	public function actionCreate($id=null)
    {
		$lstcat = News::find()->where([RECORD_STATUS => STATUS_NORMAL])->all();
        $model = new Detail();
        if ($model->load(Yii::$app->request->post())) {
            if($model->validate()){

                $model->save();
                $id = $model->id;
                $model->file = UploadedFile::getInstance($model, 'file');
                if($model->file){
                    $id = $model->id;
                    $imageName = "detailnews_".$id.'_'.getdate()[0];
                    $model->file->saveAs('uploads/'.$imageName.'.'.$model->file->extension);

                    $station = Detail::findOne($id);
                    $station->image = '@web/uploads/'.$imageName.'.'.$model->file->extension;
                    $station->save();
                }
                return $this->redirect(['index']);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
				'lstcat'=>$lstcat,
            ]);
        }
    }
	
	
	
	public function actionEdit($id)
    {
		$lstcat = News::find()->where([RECORD_STATUS => STATUS_NORMAL])->all();
		
        $model = Detail::findOne($id);
		
        if ($model->load(Yii::$app->request->post())) {
			$model->file = UploadedFile::getInstance($model, 'file');
            if ($model->file && $model->validate()) {
                $model->file->saveAs('uploads/detailnews_'.$model->id.'_'.getdate()[0] . '.' . $model->file->extension);
                $model->image = '@web/uploads/detailnews_'.$model->id.'_'.getdate()[0].'.'.$model->file->extension;
                $model->save();
                return $this->redirect('index');
            }
        } else {

            return $this->render('edit', [
                'model' => $model,
				'lstcat'=>$lstcat,
            ]);
        }
    }
}
