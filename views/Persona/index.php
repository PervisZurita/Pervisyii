<?php

use app\models\Persona;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\PersonaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Personas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="persona-index">

    <!-- Estilo para el encabezado -->
    <h1 style="color: #3498db; text-align: center;"><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if (!Yii::$app->user->isGuest && Yii::$app->user->identity->role === 'admin'): ?>
            <?= Html::a(Yii::t('app', 'Crear Persona'), ['create'], ['class' => 'btn btn-success']) ?>
        <?php endif; ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nombre',
            'apellido',
            'fecha_nacimiento',
            'genero',
            [
                'attribute' => 'estado_idestado',
                'label' => 'Estado',
                'value' => function ($model) {
                    return $model->estado->estado ?? 'No asignado';
                },
            ],
            [
                'class' => ActionColumn::className(),
                'template' => '{view}', // Solo muestra el botón 'view'
                'urlCreator' => function ($action, Persona $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idpersona' => $model->idpersona, 'estado_idestado' => $model->estado_idestado]);
                }
            ],
        ],
        // Centramos el contenido de las celdas
        'options' => ['style' => 'text-align: center;'],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
