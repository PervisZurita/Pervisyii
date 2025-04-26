<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Persona $model */

$this->title = Yii::t('app', 'Update Persona: {name}', [
    'name' => $model->idpersona,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Personas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idpersona, 'url' => ['view', 'idpersona' => $model->idpersona, 'estado_idestado' => $model->estado_idestado]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="persona-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
