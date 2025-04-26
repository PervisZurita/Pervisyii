<?php

use app\models\Direccion;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\DireccionSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Direccions');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="direccion-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Direccion'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'persona_idpersona',
            'calle',
            'ciudad',
            'provincia',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Direccion $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'iddireccion' => $model->iddireccion, 'persona_idpersona' => $model->persona_idpersona]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
