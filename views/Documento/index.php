<?php

use app\models\Documento;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\DocumentoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Documentos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="documento-index">

    <!-- Estilo para el encabezado -->
    <h1 style="color: #3498db; text-align: center;"><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if (!Yii::$app->user->isGuest && Yii::$app->user->identity->role === 'admin'): ?>
            <?= Html::a(Yii::t('app', 'Crear Documento'), ['create'], ['class' => 'btn btn-success']) ?>
        <?php endif; ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'persona_idpersona',
                'value' => function ($model) {
                    return $model->persona ? $model->persona->nombre . ' ' . $model->persona->apellido: 'No asignado';
                },
                'label' => 'Nombre de la Persona', 
            ],
            'tipo_documento',
            'numero',
            'fecha_emision',
            [
                'class' => ActionColumn::className(),
                'template' => '{view}', // Solo muestra el botón 'view'
                'urlCreator' => function ($action, Documento $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'iddocumento' => $model->iddocumento, 'persona_idpersona' => $model->persona_idpersona]);
                }
            ],
        ],
        // Centramos el contenido de las celdas
        'options' => ['style' => 'text-align: center;'],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
