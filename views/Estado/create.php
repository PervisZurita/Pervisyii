<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Estado $model */

$this->title = Yii::t('app', 'Create Estado');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Estados'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
