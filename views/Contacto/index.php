<?php

use app\models\Contacto;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\ContactoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Contactos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contacto-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Contacto'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'persona_idpersona',
            'tipo',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Contacto $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idcontacto' => $model->idcontacto, 'persona_idpersona' => $model->persona_idpersona]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
