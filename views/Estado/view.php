<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Estado $model */

$this->title = $model->idestado;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Estados'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="container py-5">

    <div class="estado-view bg-light shadow-lg rounded p-5" style="max-width: 700px; width: 100%; border-radius: 15px;">
        
        <h1 class="text-center text-primary font-weight-bold mb-4"><?= Html::encode($this->title) ?></h1>

        <p class="text-center">
            <?php if (Yii::$app->user->identity->role == 'admin'): ?>
                <?= Html::a(Yii::t('app', 'Actualizar'), ['update', 'idestado' => $model->idestado], ['class' => 'btn btn-primary px-4 py-2']) ?>
                <?= Html::a(Yii::t('app', 'Eliminar'), ['delete', 'idestado' => $model->idestado], [
                    'class' => 'btn btn-danger px-4 py-2 ml-2',
                    'data' => [
                        'confirm' => Yii::t('app', '¿Está seguro de que desea eliminar este ítem?'),
                        'method' => 'post',
                    ],
                ]) ?>
            <?php endif; ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'idestado',
                'estado',
            ],
        ]) ?>

    </div>

</div>
