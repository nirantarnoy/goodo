<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Product;

/**
 * ProductSearch represents the model behind the search form about `backend\models\Product`.
 */
class ProductSearch extends Product
{
    public $globalSearch;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['recid', 'prodgroupid', 'prodcategoryid', 'planid', 'inventunit', 'purchaseunit', 'saleunit', 'bomunit', 'isactive', 'prodtype', 'packing', 'createby'], 'integer'],
            [['prodcode','prodname', 'prodename', 'detail', 'photo', 'costdate', 'createdate', 'modifydate'], 'safe'],
            [['netweight', 'tareweight', 'grossweight', 'height', 'width', 'dept', 'density', 'minstock', 'maxstock', 'minorder', 'maxorder', 'multiple', 'cost'], 'number'],
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
        $query = Product::find();

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
            'prodgroupid' => $this->prodgroupid,
            'prodcategoryid' => $this->prodcategoryid,
            'planid' => $this->planid,
            'inventunit' => $this->inventunit,
            'purchaseunit' => $this->purchaseunit,
            'saleunit' => $this->saleunit,
            'bomunit' => $this->bomunit,
            'isactive' => $this->isactive,
            'netweight' => $this->netweight,
            'tareweight' => $this->tareweight,
            'grossweight' => $this->grossweight,
            'height' => $this->height,
            'width' => $this->width,
            'dept' => $this->dept,
            'density' => $this->density,
            'minstock' => $this->minstock,
            'maxstock' => $this->maxstock,
            'minorder' => $this->minorder,
            'maxorder' => $this->maxorder,
            'multiple' => $this->multiple,
            'prodtype' => $this->prodtype,
            'cost' => $this->cost,
            'costdate' => $this->costdate,
            'packing' => $this->packing,
            'createby' => $this->createby,
            'createdate' => $this->createdate,
            'modifydate' => $this->modifydate,
        ]);

//        $query->andFilterWhere(['like', 'prodname', $this->prodname])
//            ->andFilterWhere(['like', 'prodcode', $this->prodcode])
//           ->andFilterWhere(['like', 'prodename', $this->prodename])
//            ->andFilterWhere(['like', 'detail', $this->detail])
//            ->andFilterWhere(['like', 'photo', $this->photo]);
 $query->orFilterWhere(['like', 'prodname', $this->globalSearch])
            ->orFilterWhere(['like', 'prodcode', $this->globalSearch])
           ->orFilterWhere(['like', 'prodename', $this->globalSearch])
            ->orFilterWhere(['like', 'detail', $this->globalSearch])
            ->orFilterWhere(['like', 'photo', $this->globalSearch]);

        return $dataProvider;
    }
}
