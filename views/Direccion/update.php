<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Direccion $model */

$this->title = Yii::t('app', 'Update Direccion: {name}', [
    'name' => $model->iddireccion,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Direccions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->iddireccion, 'url' => ['view', 'iddireccion' => $model->iddireccion, 'persona_idpersona' => $model->persona_idpersona]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="direccion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
