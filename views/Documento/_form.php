<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/** @var yii\web\View $this */
/** @var app\models\Documento $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="container d-flex justify-content-center align-items-center py-5">

    <div class="documento-form bg-light shadow-lg rounded p-5" style="max-width: 700px; width: 100%; border-radius: 15px;">

        <h3 class="text-center text-primary font-weight-bold mb-4">📄 Registro de Documento</h3>

        <?php $form = ActiveForm::begin([
            'options' => ['class' => 'needs-validation', 'novalidate' => true]
        ]); ?>

        <div class="form-group">
            <?= $form->field($model, 'persona_idpersona')->dropDownList(
                \yii\helpers\ArrayHelper::map(
                    \app\models\Persona::find()->all(),
                    'idpersona',
                    function($persona) {
                        return $persona->nombre . ' ' . $persona->apellido;
                    }
                ),
                ['prompt' => 'Seleccione una persona', 'required' => true, 'class' => 'form-control border-primary']
            ) ?>
        </div>

        <div class="form-group">
            <?= $form->field($model, 'tipo_documento')->dropDownList([
                'DNI' => 'DNI',
                'Pasaporte' => 'Pasaporte',
                'Carnet de Extranjería' => 'Carnet de Extranjería',
                'RUC' => 'RUC',
                'Licencia' => 'Licencia',
            ], [
                'prompt' => 'Seleccione un tipo de documento',
                'required' => true,
                'class' => 'form-control border-primary'
            ]) ?>
        </div>

        <div class="form-group">
            <?= $form->field($model, 'numero')->textInput([
                'maxlength' => 10,
                'class' => 'form-control border-primary',
                'placeholder' => 'Ingrese el número del documento',
                'required' => true,
            ]) ?>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <?= $form->field($model, 'fecha_emision')->input('date', [
                    'class' => 'form-control border-primary'
                ]) ?>
            </div>

        <div class="form-group text-center mt-4">
            <?= Html::submitButton('<i class="fas fa-save"></i> Guardar', ['class' => 'btn btn-success px-4 py-2 rounded shadow-sm']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
