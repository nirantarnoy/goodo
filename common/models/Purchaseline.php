<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "purchaseline".
 *
 * @property integer $recid
 * @property integer $purchid
 * @property integer $prodid
 * @property string $prodname
 * @property double $qty
 * @property double $price
 * @property integer $unit
 * @property double $discount
 * @property double $discountpercent
 * @property double $vat
 * @property double $totalvat
 * @property double $totalamt
 * @property integer $prrefid
 * @property double $poremain
 * @property string $linefirmdate
 * @property integer $warehouseid
 * @property integer $loctionid
 * @property integer $lotid
 * @property integer $serialid
 * @property integer $status
 * @property string $modifydate
 * @property string $createdate
 */
class Purchaseline extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'purchaseline';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['purchid', 'prodid', 'unit', 'prrefid', 'warehouseid', 'loctionid', 'lotid', 'serialid', 'status'], 'integer'],
            [['qty', 'price', 'discount', 'discountpercent', 'vat', 'totalvat', 'totalamt', 'poremain'], 'number'],
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
            'purchid' => 'Purchid',
            'prodid' => 'Prodid',
            'prodname' => 'Prodname',
            'qty' => 'Qty',
            'price' => 'Price',
            'unit' => 'Unit',
            'discount' => 'Discount',
            'discountpercent' => 'Discountpercent',
            'vat' => 'Vat',
            'totalvat' => 'Totalvat',
            'totalamt' => 'Totalamt',
            'prrefid' => 'Prrefid',
            'poremain' => 'Poremain',
            'linefirmdate' => 'Linefirmdate',
            'warehouseid' => 'Warehouseid',
            'loctionid' => 'Loctionid',
            'lotid' => 'Lotid',
            'serialid' => 'Serialid',
            'status' => 'Status',
            'modifydate' => 'Modifydate',
            'createdate' => 'Createdate',
        ];
    }
}
