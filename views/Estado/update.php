<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Estado $model */

$this->title = Yii::t('app', 'Update Estado: {name}', [
    'name' => $model->idestado,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Estados'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idestado, 'url' => ['view', 'idestado' => $model->idestado]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="estado-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
