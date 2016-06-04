<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Vendor;

/**
 * VendorSearch represents the model behind the search form about `backend\models\Vendor`.
 */
class VendorSearch extends Vendor
{
    public $globalSearch;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['recid', 'vendorgroupid'], 'integer'],
            [['vendercode', 'vendorname', 'detail', 'payment', 'createdate', 'updatedate'], 'safe'],
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
        $query = Vendor::find();

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
            'vendorgroupid' => $this->vendorgroupid,
            'createdate' => $this->createdate,
            'updatedate' => $this->updatedate,
        ]);

//        $query->andFilterWhere(['like', 'vendercode', $this->vendercode])
//            ->andFilterWhere(['like', 'vendorname', $this->vendorname])
//            ->andFilterWhere(['like', 'detail', $this->detail])
//            ->andFilterWhere(['like', 'payment', $this->payment]);

         $query->orFilterWhere(['like', 'vendercode', $this->globalSearch])
            ->orFilterWhere(['like', 'vendorname', $this->globalSearch])
            ->orFilterWhere(['like', 'detail', $this->globalSearch])
            ->orFilterWhere(['like', 'payment', $this->globalSearch]);

        return $dataProvider;
    }
}
