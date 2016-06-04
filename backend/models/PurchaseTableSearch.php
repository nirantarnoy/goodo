<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PurchaseTable;

/**
 * PurchaseTableSearch represents the model behind the search form about `backend\models\PurchaseTable`.
 */
class PurchaseTableSearch extends PurchaseTable
{
    public $globalSearch;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['recid', 'vendorid', 'status', 'createby'], 'integer'],
            [['purchno', 'purchname', 'purchdate', 'requiredate', 'createdate', 'modifydate'], 'safe'],
            [['discount', 'discountpercent', 'vat', 'discountamt', 'discountperamt', 'vatamt', 'totalamt'], 'number'],
            ['globalSearch','string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = PurchaseTable::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'recid' => $this->recid,
            'vendorid' => $this->vendorid,
            'purchdate' => $this->purchdate,
            'requiredate' => $this->requiredate,
            'discount' => $this->discount,
            'discountpercent' => $this->discountpercent,
            'vat' => $this->vat,
            'discountamt' => $this->discountamt,
            'discountperamt' => $this->discountperamt,
            'vatamt' => $this->vatamt,
            'totalamt' => $this->totalamt,
            'status' => $this->status,
            'createby' => $this->createby,
            'createdate' => $this->createdate,
            'modifydate' => $this->modifydate,
        ]);

//        $query->andFilterWhere(['like', 'purchno', $this->purchno])
//            ->andFilterWhere(['like', 'purchname', $this->purchname]);
  $query->orFilterWhere(['like', 'purchno', $this->globalSearch])
            ->orFilterWhere(['like', 'purchname', $this->globalSearch]);

        return $dataProvider;
    }
}
