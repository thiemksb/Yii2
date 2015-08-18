<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

$this->title = 'Vehicle Create';
$this->params['breadcrumbs'][] = $this->title;
$listdata=ArrayHelper::map($lstline,'id','name');
$listcompany=Arrayhelper::map($lstcompany,'id','name');
$listuser=Arrayhelper::map($lstuser,'id','username');


?>
<div class="site-contact">


    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'station-form', 'options' => ['enctype' => 'multipart/form-data']]); ?>
                <?= $form->field($model, 'name') ?>
				<?= $form->field($model, 'company_id')->dropDownList($listcompany) ?>
				<?= $form->field($model, 'user_id')->dropDownList($listuser) ?>
                <?= $form->field($model, 'line_id')->dropDownList($listdata) ?>
                <?= $form->field($model, 'file')->fileInput() ?>
                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>

        </div>
    </div>

</div>
