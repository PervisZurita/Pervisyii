<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Contacto $model */

$this->title = $model->idcontacto;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contactos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="contacto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'idcontacto' => $model->idcontacto, 'persona_idpersona' => $model->persona_idpersona], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'idcontacto' => $model->idcontacto, 'persona_idpersona' => $model->persona_idpersona], [
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
            'idcontacto',
            'persona_idpersona',
            'tipo',
        ],
    ]) ?>

</div>
