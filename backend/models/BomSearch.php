<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Bom;

/**
 * BomSearch represents the model behind the search form about `backend\models\Bom`.
 */
class BomSearch extends Bom
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['recid', 'bomlistid', 'productid', 'type', 'calculation', 'level'], 'integer'],
            [['qtyper'], 'number'],
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
        $query = Bom::find();

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
            'bomlistid' => $this->bomlistid,
            'productid' => $this->productid,
            'qtyper' => $this->qtyper,
            'type' => $this->type,
            'calculation' => $this->calculation,
            'level' => $this->level,
        ]);

        return $dataProvider;
    }
}
