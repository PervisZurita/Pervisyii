<?php

namespace app\controllers;

use app\models\Contacto;
use app\models\ContactoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ContactoController implements the CRUD actions for Contacto model.
 */
class ContactoController extends Controller
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
     * Lists all Contacto models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ContactoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Contacto model.
     * @param int $idcontacto Idcontacto
     * @param int $persona_idpersona Persona Idpersona
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idcontacto, $persona_idpersona)
    {
        return $this->render('view', [
            'model' => $this->findModel($idcontacto, $persona_idpersona),
        ]);
    }

    /**
     * Creates a new Contacto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Contacto();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idcontacto' => $model->idcontacto, 'persona_idpersona' => $model->persona_idpersona]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Contacto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idcontacto Idcontacto
     * @param int $persona_idpersona Persona Idpersona
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idcontacto, $persona_idpersona)
    {
        $model = $this->findModel($idcontacto, $persona_idpersona);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idcontacto' => $model->idcontacto, 'persona_idpersona' => $model->persona_idpersona]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Contacto model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idcontacto Idcontacto
     * @param int $persona_idpersona Persona Idpersona
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idcontacto, $persona_idpersona)
    {
        $this->findModel($idcontacto, $persona_idpersona)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Contacto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idcontacto Idcontacto
     * @param int $persona_idpersona Persona Idpersona
     * @return Contacto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idcontacto, $persona_idpersona)
    {
        if (($model = Contacto::findOne(['idcontacto' => $idcontacto, 'persona_idpersona' => $persona_idpersona])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
    public function getPersona()
{
    return $this->hasOne(Persona::className(), ['idpersona' => 'persona_idpersona']);
}
}
