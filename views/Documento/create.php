<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Documento $model */

$this->title = Yii::t('app', 'Create Documento');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Documentos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="documento-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
