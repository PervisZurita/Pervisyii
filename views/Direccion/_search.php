<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\DireccionSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="direccion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'iddireccion') ?>

    <?= $form->field($model, 'persona_idpersona') ?>

    <?= $form->field($model, 'calle') ?>

    <?= $form->field($model, 'ciudad') ?>

    <?= $form->field($model, 'provincia') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
