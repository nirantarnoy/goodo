<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Transadjust;

/**
 * TransadjustSearch represents the model behind the search form about `backend\models\Transadjust`.
 */
class TranstableSearch extends \common\models\Transtable
{
    public $globalSearch;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['recid', 'transtype'], 'integer'],
            [['transno', 'deatail', 'docref', 'transdate', 'createdate'], 'safe'],
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
        $query = Transtable::find();

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
            'transtype' => 4,
            'transdate' => $this->transdate,
            'createdate' => $this->createdate,
        ]);

//        $query->andFilterWhere(['like', 'transno', $this->transno])
//            ->andFilterWhere(['like', 'deatail', $this->deatail])
//            ->andFilterWhere(['like', 'docref', $this->docref]);
  $query->orFilterWhere(['like', 'transno', $this->globalSearch])
            ->orFilterWhere(['like', 'deatail', $this->globalSearch])
            ->orFilterWhere(['like', 'docref', $this->globalSearch]);

        return $dataProvider;
    }
}
