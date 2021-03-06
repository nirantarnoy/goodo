<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Bomlist;

/**
 * BomlistSearch represents the model behind the search form about `backend\models\Bomlist`.
 */
class BomlistSearch extends Bomlist
{
    public $globalSearch;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['recid', 'productid', 'createby', 'active', 'approve'], 'integer'],
            [['bomname', 'detail', 'fromdate', 'todate', 'createdate'], 'safe'],
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
        $query = Bomlist::find();

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
            'productid' => $this->productid,
            'createby' => $this->createby,
            'active' => $this->active,
            'approve' => $this->approve,
            'fromdate' => $this->fromdate,
            'todate' => $this->todate,
            'createdate' => $this->createdate,
        ]);

//        $query->andFilterWhere(['like', 'bomname', $this->bomname])
//            ->andFilterWhere(['like', 'detail', $this->detail]);
   $query->orFilterWhere(['like', 'bomname', $this->globalSearch])
            ->orFilterWhere(['like', 'detail', $this->globalSearch]);

        return $dataProvider;
    }
}
