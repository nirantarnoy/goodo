<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "purchasetable".
 *
 * @property integer $recid
 * @property string $purchno
 * @property string $purchname
 * @property integer $vendorid
 * @property string $purchdate
 * @property string $requiredate
 * @property double $discount
 * @property double $discountpercent
 * @property double $vat
 * @property double $discountamt
 * @property double $discountperamt
 * @property double $vatamt
 * @property double $totalamt
 * @property integer $status
 * @property integer $createby
 * @property string $createdate
 * @property string $modifydate
 */
class Purchasetable extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'purchasetable';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vendorid', 'status', 'createby'], 'integer'],
            [['purchdate', 'requiredate', 'createdate', 'modifydate'], 'safe'],
            [['discount', 'discountpercent', 'vat', 'discountamt', 'discountperamt', 'vatamt', 'totalamt'], 'number'],
            [['purchno', 'purchname'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recid' => 'Recid',
            'purchno' => 'Purchno',
            'purchname' => 'Purchname',
            'vendorid' => 'Vendorid',
            'purchdate' => 'Purchdate',
            'requiredate' => 'Requiredate',
            'discount' => 'Discount',
            'discountpercent' => 'Discountpercent',
            'vat' => 'Vat',
            'discountamt' => 'Discountamt',
            'discountperamt' => 'Discountperamt',
            'vatamt' => 'Vatamt',
            'totalamt' => 'Totalamt',
            'status' => 'Status',
            'createby' => 'Createby',
            'createdate' => 'Createdate',
            'modifydate' => 'Modifydate',
        ];
    }
}
