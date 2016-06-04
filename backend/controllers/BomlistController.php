<?php

namespace backend\controllers;

use Yii;
use backend\models\Bomlist;
use backend\models\BomlistSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Session;
use app\models\VBomstructure;

$session = new Session();
$session->open();


/**
 * BomlistController implements the CRUD actions for Bomlist model.
 */
class BomlistController extends Controller
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
     * Lists all Bomlist models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BomlistSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Bomlist model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Bomlist model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Bomlist();

        if ($model->load(Yii::$app->request->post())) {
           // echo $model->productid;return;
            if($model->save()){
            return $this->redirect(['update', 'id' => $model->recid]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Bomlist model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelline = \backend\Models\Bom::find()->where(['bomlistid'=>$id])->all();

        if ($model->load(Yii::$app->request->post())) {
            $prodcode = $_POST['prodcode'];
            $qty = $_POST['qty'];
            $iscal = $_POST['iscal'];
            
            $cal = [];
            for($x=0;$x<=count($prodcode);$x++){
                if(count($iscal)>$x){
                    array_push($cal, 1);
                }else{
                    array_push($cal, 0);
                }
            }
            
            
            
            if(count($prodcode)>0){
              
                for($i=0;$i<=count($prodcode)-1;$i++){
                    
                $model2 = new \backend\Models\Bom();
                $model2->bomlistid = $id;
                $model2->productid = $this->findprod($prodcode[$i]);
                $model2->qtyper = (double)$qty[$i];
                $model2->calculation = (int)$cal[$i];
                
                $model2->save();
                }
            }
           // print_r($prodcode);return;
            if( $model->save()){
              return $this->redirect(['update', 'id' => $model->recid]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'modelline'=>$modelline,
            ]);
        }
    }
    public function findprod($code){
        $model = \backend\Models\Product::find()->where(['prodcode'=>$code])->one();
        return $model->recid;
    }
    /**
     * Deletes an existing Bomlist model.
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
     * Finds the Bomlist model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Bomlist the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Bomlist::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionGetdetail(){
        if(\Yii::$app->request->isAjax){
            $res = [];
            $prodid = \Yii::$app->request->post('id');
            if($prodid != ''){
                $model = \backend\Models\Product::find()->where(['prodcode'=>$prodid])->one();
                
                array_push($res, $model->prodname);
                array_push($res, '1');
                array_push($res, $this->Saleunit($model->bomunit));
                array_push($res, $model->prodtype == 0?'Parent':'Child');
            }
            
            echo json_encode($res);
        }
    }
    public function Prodid($code){
        $model = \backend\Models\Product::find()->where(['prodcode'=>$code])->one();
        return $model->recid;
    }
     public function Prodname($id){
        $model = \backend\Models\Product::find()->where(['recid'=>$id])->one();
        return $model->prodname;
    }
   public function Saleunit($id){
        $model = \backend\Models\Unit::find()->where(['recid'=>$id])->one();
        return $model->unitname;
    }
     public function Saleunitid($name){
        $model = \backend\Models\Unit::find()->where(['unitname'=>$name])->one();
        return $model->recid;
    }
    public function actionCreateid(){
         if(\Yii::$app->request->isAjax){
            $prodid = (int)\Yii::$app->request->post('prodid');
            $session = new Session();
            $session->open();
            $session['prodid']= $prodid;
        }
    }
    
    public function actionShowtree(){
         $session = new \yii\web\Session();
        $session->open();
            if(isset($session['prodid'])){
                $model = VBomstructure::find()->where(['parentbomid'=>$session['prodid']])->all();
                return $this->renderAjax('_showtree',['model'=>$model]);
            }
            
    }
     
}
