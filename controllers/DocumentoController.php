<?php

namespace app\controllers;

use app\models\Documento;
use app\models\DocumentoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DocumentoController implements the CRUD actions for Documento model.
 */
class DocumentoController extends Controller
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
     * Lists all Documento models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new DocumentoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Documento model.
     * @param int $iddocumento Iddocumento
     * @param int $persona_idpersona Persona Idpersona
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($iddocumento, $persona_idpersona)
    {
        return $this->render('view', [
            'model' => $this->findModel($iddocumento, $persona_idpersona),
        ]);
    }

    /**
     * Creates a new Documento model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Documento();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'iddocumento' => $model->iddocumento, 'persona_idpersona' => $model->persona_idpersona]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Documento model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $iddocumento Iddocumento
     * @param int $persona_idpersona Persona Idpersona
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($iddocumento, $persona_idpersona)
    {
        $model = $this->findModel($iddocumento, $persona_idpersona);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'iddocumento' => $model->iddocumento, 'persona_idpersona' => $model->persona_idpersona]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Documento model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $iddocumento Iddocumento
     * @param int $persona_idpersona Persona Idpersona
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($iddocumento, $persona_idpersona)
    {
        $this->findModel($iddocumento, $persona_idpersona)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Documento model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $iddocumento Iddocumento
     * @param int $persona_idpersona Persona Idpersona
     * @return Documento the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($iddocumento, $persona_idpersona)
    {
        if (($model = Documento::findOne(['iddocumento' => $iddocumento, 'persona_idpersona' => $persona_idpersona])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
