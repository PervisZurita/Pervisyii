<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Persona $model */

$this->title = Yii::t('app', 'Create Persona');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Personas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="persona-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
