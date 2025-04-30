<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Direccion $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="direccion-form">

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



<?= $form->field($model, 'calle')->textInput(['maxlength' => true, 'placeholder'=>'Nombre de la Calle','required'=>true]) ?>

<?= $form->field($model, 'ciudad')->textInput(['maxlength' => true, 'placeholder'=>'Nombre de la Ciudad','required'=>true]) ?>

<?= $form->field($model, 'provincia')->textInput(['maxlength' => true, 'placeholder'=>'Nombre de la Provincia','required'=>true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
