<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Customer;

/**
 * CustomerSearch represents the model behind the search form about `backend\models\Customer`.
 */
class CustomerSearch extends Customer
{
    public $globalSearch;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['recid', 'customergroupid', 'currencyid'], 'integer'],
            [['customercode', 'customername', 'detail', 'taxid', 'payment', 'createdate'], 'safe'],
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
        $query = Customer::find();

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
            'customergroupid' => $this->customergroupid,
            'currencyid' => $this->currencyid,
            'createdate' => $this->createdate,
        ]);

        $query->andFilterWhere(['like', 'customercode', $this->customercode])
            ->andFilterWhere(['like', 'customername', $this->customername])
            ->andFilterWhere(['like', 'detail', $this->detail])
            ->andFilterWhere(['like', 'taxid', $this->taxid])
            ->andFilterWhere(['like', 'payment', $this->payment]);

        return $dataProvider;
    }
}
