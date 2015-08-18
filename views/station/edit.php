<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\ArrayHelper;
$this->title = 'Stations Update';
$this->params['breadcrumbs'][] = $this->title;
$listdata=ArrayHelper::map($lstline,'id','name');
?>
<div class="site-contact">


    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'line-form', 'options' => ['enctype' => 'multipart/form-data']]); ?>
            <?= $form->field($model, 'name') ?>
            <?= $form->field($model, 'description')->textarea() ?>
			<?= $form->field($model, 'line_id')->dropDownList($listdata) ?>
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
