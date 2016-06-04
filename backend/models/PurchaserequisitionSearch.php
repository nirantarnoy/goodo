<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Purchaserequisition;

/**
 * PurchaserequisitionSearch represents the model behind the search form about `backend\models\Purchaserequisition`.
 */
class PurchaserequisitionSearch extends Purchaserequisition
{
     public $globalSearch;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['recid', 'status', 'approveby', 'createby'], 'integer'],
            [['prno', 'prdate', 'requiredate', 'createdate', 'modifydate'], 'safe'],
            [['globalSearch'],'string'],
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
        $query = Purchaserequisition::find();

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
//        $query->andFilterWhere([
//            'recid' => $this->recid,
//            'prdate' => $this->prdate,
//            'requiredate' => $this->requiredate,
//            'status' => $this->status,
//            'approveby' => $this->approveby,
//            'createby' => $this->createby,
//            'createdate' => $this->createdate,
//            'modifydate' => $this->modifydate,
//        ]);

        $query->andFilterWhere(['like', 'prno', $this->globalSearch]);

        return $dataProvider;
    }
}
