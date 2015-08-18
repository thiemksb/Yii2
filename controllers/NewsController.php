<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\News;
use app\models\Categories;
use yii\web\UploadedFile;

class NewsController extends Controller
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
			$model= new News;
			$model=News::find()->where(['record_status'=>1])->all();
			return $this->render('index',['model'=>$model]);
		} else {
			$model= new News;
			$model=News::find()->where(['record_status'=>1,'cat_id'=>$id])->all();
			return $this->render('index',['model'=>$model]);
		}
			
	}
	public function actionView($id)
    {		
		$model= new News;
		$model=News::find($id)->where(['record_status'=>1,'id'=>$id])->all();
        return $this->render('view',['model'=>$model]);
    }
	
	public function actionCreate($id=null)
    {
		$lstcat = Categories::find()->where([RECORD_STATUS => STATUS_NORMAL])->all();
        $model = new News();
        if ($model->load(Yii::$app->request->post())) {
            if($model->validate()){
				$model->record_status = 1;
                $model->save();
                $id = $model->id;
                $model->file = UploadedFile::getInstance($model, 'file');
                if($model->file){
                    $id = $model->id;
                    $imageName = "news_".$id.'_'.getdate()[0];
                    $model->file->saveAs('uploads/'.$imageName.'.'.$model->file->extension);

                    $station = News::findOne($id);
                    $station->img = '@web/uploads/'.$imageName.'.'.$model->file->extension;
                    $station->save();
                }
                return $this->redirect(['index']);
            }
        } else {
            return $this->render('/news/create', [
                'model' => $model,
				'lstcat'=>$lstcat,
            ]);
        }
    }
	
	
	
	public function actionEdit($id)
    {
		$lstcat = Categories::find()->where([RECORD_STATUS => STATUS_NORMAL])->all();
		
        $model = News::findOne($id);
		
        if ($model->load(Yii::$app->request->post())) {
			$model->file = UploadedFile::getInstance($model, 'file');
            if ($model->file && $model->validate()) {
                $model->file->saveAs('uploads/detailnews_'.$model->id.'_'.getdate()[0] . '.' . $model->file->extension);
                $model->img = '@web/uploads/detailnews_'.$model->id.'_'.getdate()[0].'.'.$model->file->extension;
                $model->record_status = 1;
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
	public function actionDelete($id)
    {
        $model = News::findOne($id);
		$model->record_status = 0;
		$model->save();
		return $this->redirect('index');
    }
}
