<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Arrayhelper;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

$this->title = 'News Create';
$this->params['breadcrumbs'][] = $this->title;
$lstcat=Arrayhelper::map($lstcat,'id','name');
?>
<div class="site-contact">


    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'line-form', 'options' => ['enctype' => 'multipart/form-data']]); ?>
                <?= $form->field($model, 'title') ?>
				<?= $form->field($model, 'cat_id')->dropDownList($lstcat) ?>
				<?= $form->field($model, 'author') ?>
                <?= $form->field($model, 'des')->textarea() ?>
				<?= $form->field($model, 'content')->textarea() ?>
                <?= $form->field($model, 'time')->input('date')?>
                <?= $form->field($model, 'file')->fileInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>

        </div>
    </div>

</div>
