<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Contacto $model */

$this->title = Yii::t('app', 'Update Contacto: {name}', [
    'name' => $model->idcontacto,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contactos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idcontacto, 'url' => ['view', 'idcontacto' => $model->idcontacto, 'persona_idpersona' => $model->persona_idpersona]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="contacto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
