<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Location;

/**
 * LocationSearch represents the model behind the search form about `backend\models\Location`.
 */
class LocationSearch extends Location
{
    public $globalSearch;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['recid', 'warehouseid'], 'integer'],
            [['locationname', 'detail', 'createdate', 'updatedate'], 'safe'],
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
        $query = Location::find();

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
            'warehouseid' => $this->warehouseid,
            'createdate' => $this->createdate,
            'updatedate' => $this->updatedate,
        ]);

//        $query->andFilterWhere(['like', 'locationname', $this->locationname])
//            ->andFilterWhere(['like', 'detail', $this->detail]);
 $query->orFilterWhere(['like', 'locationname', $this->globalSearch])
            ->orFilterWhere(['like', 'detail', $this->globalSearch]);

        return $dataProvider;
    }
}
