<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\Persona $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="container d-flex justify-content-center align-items-center py-5">

    <div class="persona-form bg-light shadow-lg rounded p-5" style="max-width: 700px; width: 100%;">

        <h3 class="text-center text-primary font-weight-bold mb-4">🧾 Registro de Persona</h3>

        <?php $form = ActiveForm::begin([
            'options' => ['class' => 'needs-validation', 'novalidate' => true]
        ]); ?>

        <div class="form-row">
            <div class="form-group col-md-6">
                <?= $form->field($model, 'nombre')->textInput([
                    'maxlength' => true,
                    'placeholder' => 'Ingrese su nombre',
                    'class' => 'form-control border-primary'
                ]) ?>
            </div>
            <div class="form-group col-md-6">
                <?= $form->field($model, 'apellido')->textInput([
                    'maxlength' => true,
                    'placeholder' => 'Ingrese su apellido',
                    'class' => 'form-control border-primary'
                ]) ?>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <?= $form->field($model, 'fecha_nacimiento')->input('date', [
                    'class' => 'form-control border-primary'
                ]) ?>
            </div>
            <div class="form-group col-md-6">
                <?= $form->field($model, 'genero')->dropDownList(
                    ['Masculino' => 'Masculino', 'Femenino' => 'Femenino'],
                    ['prompt' => 'Seleccione género', 'class' => 'form-control border-primary']
                ) ?>
            </div>
        </div>

        <div class="form-group">
            <?= $form->field($model, 'estado_idestado')->dropDownList(
                ArrayHelper::map(\app\models\Estado::find()->all(), 'idestado', 'estado'),
                [
                    'prompt' => 'Seleccione estado',
                    'class' => 'form-control border-primary'
                ]
            ) ?>
        </div>

        <div class="form-group text-center mt-4">
            <?= Html::submitButton('<i class="fas fa-save"></i> Guardar', ['class' => 'btn btn-primary px-4 py-2']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
