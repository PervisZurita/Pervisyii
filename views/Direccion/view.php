<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Direccion $model */

$this->title = $model->iddireccion;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Direccions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="direccion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'iddireccion' => $model->iddireccion, 'persona_idpersona' => $model->persona_idpersona], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'iddireccion' => $model->iddireccion, 'persona_idpersona' => $model->persona_idpersona], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'iddireccion',
            'persona_idpersona',
            'calle',
            'ciudad',
            'provincia',
        ],
    ]) ?>

</div>
