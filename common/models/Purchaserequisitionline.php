<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "purchaserequisitionline".
 *
 * @property integer $recid
 * @property integer $prid
 * @property integer $prodid
 * @property string $prodname
 * @property double $qty
 * @property double $price
 * @property integer $unit
 * @property double $totalamt
 * @property string $linefirmdate
 * @property integer $status
 * @property string $modifydate
 * @property string $createdate
 */
class Purchaserequisitionline extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'purchaserequisitionline';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prid', 'prodid', 'unit', 'status'], 'integer'],
            [['qty', 'price', 'totalamt'], 'number'],
            [['linefirmdate', 'modifydate', 'createdate'], 'safe'],
            [['prodname'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recid' => 'Recid',
            'prid' => 'Prid',
            'prodid' => 'Prodid',
            'prodname' => 'Prodname',
            'qty' => 'Qty',
            'price' => 'Price',
            'unit' => 'Unit',
            'totalamt' => 'Totalamt',
            'linefirmdate' => 'Linefirmdate',
            'status' => 'Status',
            'modifydate' => 'Modifydate',
            'createdate' => 'Createdate',
        ];
    }
}
