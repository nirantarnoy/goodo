<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property integer $recid
 * @property string $customercode
 * @property string $customername
 * @property string $detail
 * @property integer $customergroupid
 * @property integer $currencyid
 * @property string $taxid
 * @property string $payment
 * @property string $createdate
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customergroupid', 'currencyid'], 'integer'],
            [['createdate'], 'safe'],
            [['customercode'], 'string', 'max' => 20],
            [['customername', 'detail', 'payment'], 'string', 'max' => 255],
            [['taxid'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recid' => 'Recid',
            'customercode' => 'Customercode',
            'customername' => 'Customername',
            'detail' => 'Detail',
            'customergroupid' => 'Customergroupid',
            'currencyid' => 'Currencyid',
            'taxid' => 'Taxid',
            'payment' => 'Payment',
            'createdate' => 'Createdate',
        ];
    }
}
