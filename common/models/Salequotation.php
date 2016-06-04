<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "salequotation".
 *
 * @property integer $recid
 * @property string $salequoteno
 * @property string $deliverydate
 * @property string $shipdate
 * @property integer $customerid
 * @property integer $currencyid
 * @property double $discount
 * @property double $discountper
 * @property integer $vat
 * @property double $discountamt
 * @property double $discountperamt
 * @property double $vatamt
 * @property double $totalamt
 * @property integer $status
 * @property string $refer
 * @property string $totaltext
 * @property string $createdate
 */
class Salequotation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'salequotation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['deliverydate', 'shipdate', 'createdate'], 'safe'],
            [['customerid', 'currencyid', 'vat', 'status'], 'integer'],
            [['discount', 'discountper', 'discountamt', 'discountperamt', 'vatamt', 'totalamt'], 'number'],
            [['salequoteno'], 'string', 'max' => 10],
            [['refer'], 'string', 'max' => 255],
            [['totaltext'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recid' => 'Recid',
            'salequoteno' => 'Salequoteno',
            'deliverydate' => 'Deliverydate',
            'shipdate' => 'Shipdate',
            'customerid' => 'Customerid',
            'currencyid' => 'Currencyid',
            'discount' => 'Discount',
            'discountper' => 'Discountper',
            'vat' => 'Vat',
            'discountamt' => 'Discountamt',
            'discountperamt' => 'Discountperamt',
            'vatamt' => 'Vatamt',
            'totalamt' => 'Totalamt',
            'status' => 'Status',
            'refer' => 'Refer',
            'totaltext' => 'Totaltext',
            'createdate' => 'Createdate',
        ];
    }
}
