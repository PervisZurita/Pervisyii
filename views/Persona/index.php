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

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Persona'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nombre',
            'apellido',
            'fecha_nacimiento',
            'genero',
            'estado_idestado',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Persona $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idpersona' => $model->idpersona, 'estado_idestado' => $model->estado_idestado]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
