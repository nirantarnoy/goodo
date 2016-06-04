<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "v_bomstructure".
 *
 * @property integer $recid
 * @property string $bomname
 * @property string $detail
 * @property string $createdate
 * @property integer $approve
 * @property integer $active
 * @property integer $parentbomid
 * @property string $prodcode
 * @property string $prodname
 * @property integer $childid
 * @property string $childcode
 * @property string $childname
 * @property string $qtyper
 * @property integer $inventunit
 * @property string $unitname
 */
class VBomstructure extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'v_bomstructure';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['recid', 'approve', 'active', 'parentbomid', 'childid', 'inventunit'], 'integer'],
            [['createdate'], 'safe'],
            [['qtyper'], 'number'],
            [['bomname', 'detail', 'prodcode', 'prodname', 'childcode', 'childname', 'unitname'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recid' => 'Recid',
            'bomname' => 'Bomname',
            'detail' => 'Detail',
            'createdate' => 'Createdate',
            'approve' => 'Approve',
            'active' => 'Active',
            'parentbomid' => 'Parentbomid',
            'prodcode' => 'Prodcode',
            'prodname' => 'Prodname',
            'childid' => 'Childid',
            'childcode' => 'Childcode',
            'childname' => 'Childname',
            'qtyper' => 'Qtyper',
            'inventunit' => 'Inventunit',
            'unitname' => 'Unitname',
        ];
    }
}
