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

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Documento'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'persona_idpersona',
            'tipo_documento',
            'numero',
            'fecha_emision',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Documento $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'iddocumento' => $model->iddocumento, 'persona_idpersona' => $model->persona_idpersona]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
