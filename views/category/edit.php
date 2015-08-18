<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

$this->title = 'News Update';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">


    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'line-form', 'options' => ['enctype' => 'multipart/form-data']]); ?>
            <?= $form->field($model, 'name') ?>
            <?= $form->field($model, 'des')->textarea() ?>
           <?= $form->field($model, 'created_date')->input('date') ?>
            <?= $form->field($model, 'file')->fileInput() ?>

            <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-md-4">
            <?= Html::img($model->image); ?>
        </div>
    </div>

</div>
