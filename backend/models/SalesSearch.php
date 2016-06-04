<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Sales;

/**
 * SalesSearch represents the model behind the search form about `backend\models\Sales`.
 */
class SalesSearch extends Sales
{
    public $globalSearch;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['recid', 'customerid', 'currencyid', 'vat', 'status'], 'integer'],
            [['saleno', 'deliverydate', 'shipdate', 'refer', 'totaltext', 'createdate'], 'safe'],
            [['discount', 'discountper', 'discountamt', 'discountperamt', 'vatamt', 'totalamt'], 'number'],
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
        $query = Sales::find();

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
            'deliverydate' => $this->deliverydate,
            'shipdate' => $this->shipdate,
            'customerid' => $this->customerid,
            'currencyid' => $this->currencyid,
            'discount' => $this->discount,
            'discountper' => $this->discountper,
            'vat' => $this->vat,
            'discountamt' => $this->discountamt,
            'discountperamt' => $this->discountperamt,
            'vatamt' => $this->vatamt,
            'totalamt' => $this->totalamt,
            'status' => $this->status,
            'createdate' => $this->createdate,
        ]);

        $query->andFilterWhere(['like', 'saleno', $this->saleno])
            ->andFilterWhere(['like', 'refer', $this->refer])
            ->andFilterWhere(['like', 'totaltext', $this->totaltext]);

        return $dataProvider;
    }
}
