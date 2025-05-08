<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Estado $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="container d-flex justify-content-center align-items-center py-5">

    <div class="estado-form bg-light shadow-lg rounded p-5" style="max-width: 700px; width: 100%; border-radius: 15px;">

        <h3 class="text-center text-primary font-weight-bold mb-4">📝 Registro de Estado</h3>

        <?php $form = ActiveForm::begin([
            'options' => ['class' => 'needs-validation', 'novalidate' => true]
        ]); ?>

        <!-- Campo Estado -->
        <div class="form-group">
            <?= $form->field($model, 'estado')->textInput([
                'maxlength' => true,
                'placeholder' => 'Escribir Estado',
                'required' => true,
                'class' => 'form-control border-primary'
            ]) ?>
        </div>

        <!-- Botón de Guardar -->
        <div class="form-group text-center mt-4">
            <?= Html::submitButton('<i class="fas fa-save"></i> Guardar', ['class' => 'btn btn-success px-4 py-2 rounded shadow-sm']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
