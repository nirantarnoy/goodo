<?php
namespace backend\controllers;
use backend\Models\Bomlist;
use app\models\VBomstructure;
use yii\web\Session;


class BomtreeviewController extends \yii\web\Controller{
    public function actionIndex(){
        
                return $this->render('index');
        
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
                return $this->render('index',['model'=>$model]);
            }
            
    }
}
