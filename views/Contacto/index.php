<?php

use app\models\Contacto;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView; // Asegúrate de que esta línea esté presente
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\ContactoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Contactos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contacto-index">

    <!-- Estilo para el encabezado -->
    <h1 style="color: #3498db; text-align: center;"><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if (!Yii::$app->user->isGuest && Yii::$app->user->identity->role === 'admin'): ?>
            <?= Html::a(Yii::t('app', 'Crear Contacto'), ['create'], ['class' => 'btn btn-success']) ?>
        <?php endif; ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        
        // Cambiar para mostrar el nombre de la persona
        [
            'attribute' => 'persona_idpersona',
            'value' => function ($model) {
                // Accedemos a la relación persona y mostramos el nombre
                return $model->persona ? $model->persona->nombre . ' ' . $model->persona->apellido: 'No asignado';
            },
            'label' => 'Nombre de la Persona', // Cambiar el título de la columna
        ],
        
        'tipo',
        
        [
            'class' => ActionColumn::className(),
            'template' => '{view}', // Solo muestra el botón 'view'
            'urlCreator' => function ($action, Contacto $model, $key, $index, $column) {
                return Url::toRoute([$action, 'idcontacto' => $model->idcontacto, 'persona_idpersona' => $model->persona_idpersona]);
            }
        ],
    ],
    'options' => ['style' => 'text-align: center;'],
]); ?>
    <?php Pjax::end(); ?>

</div>
