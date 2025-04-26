<?php

namespace app\controllers;

use app\models\Estado;
use app\models\EstadoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EstadoController implements the CRUD actions for Estado model.
 */
class EstadoController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Estado models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new EstadoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Estado model.
     * @param int $idestado Idestado
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idestado)
    {
        return $this->render('view', [
            'model' => $this->findModel($idestado),
        ]);
    }

    /**
     * Creates a new Estado model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Estado();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idestado' => $model->idestado]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Estado model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idestado Idestado
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idestado)
    {
        $model = $this->findModel($idestado);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idestado' => $model->idestado]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Estado model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idestado Idestado
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idestado)
    {
        $this->findModel($idestado)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Estado model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idestado Idestado
     * @return Estado the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idestado)
    {
        if (($model = Estado::findOne(['idestado' => $idestado])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
