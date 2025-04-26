<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Contacto $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="contacto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'persona_idpersona')->textInput() ?>

    <?= $form->field($model, 'tipo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
