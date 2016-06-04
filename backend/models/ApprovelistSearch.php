<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Approvelist;

/**
 * ApprovelistSearch represents the model behind the search form about `backend\models\Approvelist`.
 */
class ApprovelistSearch extends Approvelist
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['recid', 'vendid', 'prodid', 'createby'], 'integer'],
            [['fromdate', 'todate', 'createdate'], 'safe'],
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
        $query = Approvelist::find();

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
            'vendid' => $this->vendid,
            'prodid' => $this->prodid,
            'fromdate' => $this->fromdate,
            'todate' => $this->todate,
            'createby' => $this->createby,
            'createdate' => $this->createdate,
        ]);

        return $dataProvider;
    }
}
