<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "purchaserequisition".
 *
 * @property integer $recid
 * @property string $prno
 * @property string $prdate
 * @property string $requiredate
 * @property integer $status
 * @property integer $approveby
 * @property integer $createby
 * @property string $createdate
 * @property string $modifydate
 */
class Purchaserequisition extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'purchaserequisition';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prdate', 'requiredate', 'createdate', 'modifydate'], 'safe'],
            [['status', 'approveby', 'createby'], 'integer'],
            [['prno'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recid' => 'Recid',
            'prno' => 'Prno',
            'prdate' => 'Prdate',
            'requiredate' => 'Requiredate',
            'status' => 'Status',
            'approveby' => 'Approveby',
            'createby' => 'Createby',
            'createdate' => 'Createdate',
            'modifydate' => 'Modifydate',
        ];
    }
}
