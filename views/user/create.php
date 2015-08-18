<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

$this->title = 'Line Create';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">


    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'line-form', 'options' => ['enctype' => 'multipart/form-data']]); ?>
                <?= $form->field($model, 'name') ?>
                <?= $form->field($model, 'description')->textarea() ?>
                <?= $form->field($model, 'start_time')->widget(\bootui\datetimepicker\Timepicker::className(),[
                    'options' => ['class' => 'form-control'],
                    'addon' => ['prepend' => 'Start time'],
                    'format' => 'HH:mm',
                ]); ?>

                <?= $form->field($model, 'end_time')->widget(\bootui\datetimepicker\Timepicker::className(),[
                    'options' => ['class' => 'form-control'],
                    'addon' => ['prepend' => 'End Time'],
                    'format' => 'HH:mm',
                ]); ?>
                <?= $form->field($model, 'file')->fileInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>

        </div>
    </div>

</div>
