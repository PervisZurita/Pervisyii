<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Contacto $model */

$this->title = Yii::t('app', 'Crear Contacto');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contactos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contacto-create">

  

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
