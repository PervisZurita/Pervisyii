<?php

namespace app\controllers;

use app\models\Direccion;
use app\models\DireccionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DireccionController implements the CRUD actions for Direccion model.
 */
class DireccionController extends Controller
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
     * Lists all Direccion models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new DireccionSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Direccion model.
     * @param int $iddireccion Iddireccion
     * @param int $persona_idpersona Persona Idpersona
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($iddireccion, $persona_idpersona)
    {
        return $this->render('view', [
            'model' => $this->findModel($iddireccion, $persona_idpersona),
        ]);
    }

    /**
     * Creates a new Direccion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Direccion();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'iddireccion' => $model->iddireccion, 'persona_idpersona' => $model->persona_idpersona]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Direccion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $iddireccion Iddireccion
     * @param int $persona_idpersona Persona Idpersona
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($iddireccion, $persona_idpersona)
    {
        $model = $this->findModel($iddireccion, $persona_idpersona);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'iddireccion' => $model->iddireccion, 'persona_idpersona' => $model->persona_idpersona]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Direccion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $iddireccion Iddireccion
     * @param int $persona_idpersona Persona Idpersona
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($iddireccion, $persona_idpersona)
    {
        $this->findModel($iddireccion, $persona_idpersona)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Direccion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $iddireccion Iddireccion
     * @param int $persona_idpersona Persona Idpersona
     * @return Direccion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($iddireccion, $persona_idpersona)
    {
        if (($model = Direccion::findOne(['iddireccion' => $iddireccion, 'persona_idpersona' => $persona_idpersona])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
