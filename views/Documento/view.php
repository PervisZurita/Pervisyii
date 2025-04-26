<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Documento $model */

$this->title = $model->iddocumento;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Documentos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="documento-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'iddocumento' => $model->iddocumento, 'persona_idpersona' => $model->persona_idpersona], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'iddocumento' => $model->iddocumento, 'persona_idpersona' => $model->persona_idpersona], [
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
            'iddocumento',
            'persona_idpersona',
            'tipo_documento',
            'numero',
            'fecha_emision',
        ],
    ]) ?>

</div>
