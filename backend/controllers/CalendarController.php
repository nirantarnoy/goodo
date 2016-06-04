<?php

namespace backend\controllers;

use Yii;
use backend\models\Calendar;
use backend\models\CalendarSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Calendarworkday;

/**
 * CalendarController implements the CRUD actions for Calendar model.
 */
class CalendarController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Calendar models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CalendarSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Calendar model.
     * @param integer $id
     * @return mixed
     */
    public function actionShowpop(){
        return $this->renderAjax('_genworkday');
    }
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    public function actionGenwkdpop(){
        return $this->render('genworkday');
    }
    public function actionGenworkingday(){
        
    }

    /**
     * Creates a new Calendar model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Calendar();

        if ($model->load(Yii::$app->request->post())) {
            $model->startdate = date('Y-m-d',  strtotime($model->startdate));
            $model->enddate = date('Y-m-d',  strtotime($model->enddate));
            if($model->save()){
            return $this->redirect(['view', 'id' => $model->recid]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Calendar model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $events = \backend\models\Events::find()->all();
        $eventsx = [];
        foreach ($events as $value){
            $event = new \yii2fullcalendar\models\Event();
            $event->id = $value->recid;
            $event->title = $value->title;
            $event->start = $value->start; //date('Y-m-d\Th:m:s\Z',strtotime('tomorrow 6am'));
            $event->className = 'btn btn-success';
            $eventsx[] = $event;
        }

        if ($model->load(Yii::$app->request->post())) {
            $model->startdate = date('Y-m-d',  strtotime($model->startdate));
            $model->enddate = date('Y-m-d',  strtotime($model->enddate));
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->recid]);
            }
            
        } else {
            return $this->render('update', [
                'model' => $model,
                'eventsx'=>$eventsx,
            ]);
        }
    }

    /**
     * Deletes an existing Calendar model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Calendar model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Calendar the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Calendar::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
