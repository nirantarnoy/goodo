<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Unitconversion;

/**
 * UnitconversionSearch represents the model behind the search form about `backend\models\Unitconversion`.
 */
class UnitconversionSearch extends Unitconversion
{
    public $globalSearch;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['recid', 'prodid', 'fromunit', 'tounit'], 'integer'],
            [['fromfactor', 'tofactor'], 'number'],
            [['createdate', 'updatedate'], 'safe'],
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
        $query = Unitconversion::find();

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
            'prodid' => $this->prodid,
            'fromunit' => $this->fromunit,
            'tounit' => $this->tounit,
            'fromfactor' => $this->fromfactor,
            'tofactor' => $this->tofactor,
            'createdate' => $this->createdate,
            'updatedate' => $this->updatedate,
        ]);
        
        $query->orFilterWhere(['like','prodid',  $this->globalSearch]);

        return $dataProvider;
    }
}
