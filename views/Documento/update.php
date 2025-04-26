<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Documento $model */

$this->title = Yii::t('app', 'Update Documento: {name}', [
    'name' => $model->iddocumento,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Documentos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->iddocumento, 'url' => ['view', 'iddocumento' => $model->iddocumento, 'persona_idpersona' => $model->persona_idpersona]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="documento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
