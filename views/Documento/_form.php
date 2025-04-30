<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
/** @var yii\web\View $this */
/** @var app\models\Documento $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="documento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'persona_idpersona')->dropDownList(
    \yii\helpers\ArrayHelper::map(
        \app\models\Persona::find()->all(),
        'idpersona',
        function($persona) {
            return $persona->nombre . ' ' . $persona->apellido;
        }
    ),
    ['prompt' => 'Seleccione una persona', 'required' => true]
) ?>


<?= $form->field($model, 'tipo_documento')->dropDownList([
    'DNI' => 'DNI',
    'Pasaporte' => 'Pasaporte',
    'Carnet de Extranjería' => 'Carnet de Extranjería',
    'RUC' => 'RUC',
    'Licencia' => 'Licencia',
], [
    'prompt' => 'Seleccione un tipo de documento',
    'required' => true,
]) ?>

<?= $form->field($model, 'numero')->textInput([
    'maxlength' => 10,
    'class' => 'form-control',
    'placeholder' => 'Ingrese el número del documento',
    'required' => true,
]) ?>


    <?= $form->field($model, 'fecha_emision')->widget(DatePicker::class, [
    'language' => 'es',
    'dateFormat' => 'yyyy-MM-dd',
    'options' => [
        'class' => 'form-control',
        'placeholder' => 'Seleccione una fecha',
        'required' => true
    ],
]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
