<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Station Preview';
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
				<?= $form->field($model, 'line_id')->textInput(['disabled'=>true]) ?>
                <?= Html::img($model->image)?>
            <?php ActiveForm::end(); ?>

        </div>
    </div>

</div>
