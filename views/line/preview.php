<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

$this->title = 'Line Preview';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">


    <div class="row">
        <div class="col-lg-6">
            <?php $form = ActiveForm::begin(['id' => 'line-form']); ?>
                <?= $form->field($model, 'id')->hiddenInput(['name'=>'id'])->label(false) ?>
                <?= $form->field($model, 'record_status')->hiddenInput(['name'=>'id'])->label(false) ?>
                <?= $form->field($model, 'name')->textInput(['disabled'=>true]) ?>
                <?= $form->field($model, 'description')->textarea(['disabled'=>true]) ?>
                <?= $form->field($model, 'start_time')->widget(\bootui\datetimepicker\Timepicker::className(),[
                    'options' => ['class' => 'form-control', 'disabled'=>true],
                    'addon' => ['prepend' => 'Start time'],
                    'format' => 'HH:mm',
                ]); ?>

                <?= $form->field($model, 'end_time')->widget(\bootui\datetimepicker\Timepicker::className(),[
                    'options' => ['class' => 'form-control', 'disabled'=>true],
                    'addon' => ['prepend' => 'End Time'],
                    'format' => 'HH:mm',
                ]); ?>
                <?= Html::img($model->image)?>
            <?php ActiveForm::end(); ?>

        </div>
    </div>

</div>
