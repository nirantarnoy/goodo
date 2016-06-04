<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "productcategory".
 *
 * @property integer $recid
 * @property string $categoryname
 * @property string $detail
 * @property integer $parentid
 * @property string $createdate
 */
class Productcategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'productcategory';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parentid'], 'integer'],
            [['createdate'], 'safe'],
            [['categoryname', 'detail'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recid' => 'Recid',
            'categoryname' => 'Categoryname',
            'detail' => 'Detail',
            'parentid' => 'Parentid',
            'createdate' => 'Createdate',
        ];
    }
}
