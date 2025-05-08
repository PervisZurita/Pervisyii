<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Contacto $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="container d-flex justify-content-center align-items-center py-5">

    <div class="contacto-form bg-light shadow-lg rounded p-5" style="max-width: 700px; width: 100%; border-radius: 15px;">

        <h3 class="text-center text-primary font-weight-bold mb-4">📞 Registro de Contacto</h3>

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
            <?= $form->field($model, 'tipo')->textInput([
                'maxlength' => true,
                'placeholder' => 'Escribe el Contacto',
                'required' => true,
                'class' => 'form-control border-primary'
            ]) ?>
        </div>

        <div class="form-group text-center mt-4">
            <?= Html::submitButton('<i class="fas fa-save"></i> Guardar', ['class' => 'btn btn-success px-4 py-2 rounded shadow-sm']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
