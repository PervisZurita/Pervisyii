<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Direccion $model */

$this->title = Yii::t('app', 'Create Direccion');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Direccions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="direccion-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
