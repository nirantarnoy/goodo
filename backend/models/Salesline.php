<?php
namespace backend\models;
use yii\db\ActiveRecord;

class Salesline extends \common\models\Saleline{
    public function behaviors() {
        $current_timestamp = date('Y-m-d H:i:s');
        return[
            'timestamp'=>[
                'class'=>  \yii\behaviors\AttributeBehavior::className(),
                'attributes'=>[
                ActiveRecord::EVENT_BEFORE_INSERT=>'createdate',
                ],
                'value'=> $current_timestamp,
            ]
        ];
    }
}

