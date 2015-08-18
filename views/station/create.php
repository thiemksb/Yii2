<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

$this->title = 'Station Create';
$this->params['breadcrumbs'][] = $this->title;
$listData=ArrayHelper::map($listLine,'id','name');

?>
<div class="site-contact">


    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'station-form', 'options' => ['enctype' => 'multipart/form-data']]); ?>
                <?= $form->field($model, 'name') ?>
                <?= $form->field($model, 'line_id')->dropDownList($listData) ?>

                <?= $form->field($model, 'description')->textarea() ?>
                <?= $form->field($model, 'file')->fileInput() ?>
                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>

        </div>
    </div>

</div>
