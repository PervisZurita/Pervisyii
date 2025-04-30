<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;


/** @var yii\web\View $this */
/** @var app\models\Persona $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="persona-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true, 'placeholder'=>'Nombre de la Persona','required'=>true]) ?>

    <?= $form->field($model, 'apellido')->textInput(['maxlength' => true, 'placeholder'=>'Apellido de la Persona','required'=>true]) ?>

    <?= $form->field($model, 'fecha_nacimiento')->textInput() ?>

    <?= $form->field($model, 'genero')->dropDownList(
    ['Masculino' => 'Masculino', 'Femenino' => 'Femenino'],
    ['prompt' => 'Seleccione el género', 'required' => true]
) ?>

    <?= $form->field($model, 'estado_idestado')->dropDownList(
    \yii\helpers\ArrayHelper::map(\app\models\Estado::find()->all(), 'idestado', 'estado'),
    ['prompt' => 'Seleccione un estado']
) ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
