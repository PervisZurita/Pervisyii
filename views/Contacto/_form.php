<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Contacto $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="contacto-form">

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


<?= $form->field($model, 'tipo')->textInput(['maxlength' => true, 'placeholder'=>'Escribe el Contacto','required'=>true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
