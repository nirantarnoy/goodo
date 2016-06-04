<?php
namespace backend\models;

class Productonhand extends \common\models\Productonhand{
     public function getProduct() {
        return $this->hasOne(Product::className(), ['recid' => 'prodid']);
    }

    public function getUnits() {
        return $this->hasOne(Unit::className(), ['recid' => 'unit']);
    }

    public function getWh() {
        return $this->hasOne(Warehouse::className(), ['recid' => 'warehouseid']);
    }

    public function getLoc() {
        return $this->hasOne(Location::className(), ['recid' => 'locationid']);
    }

    public function getLot() {
        return $this->hasOne(Lotnumber::className(), ['recid' => 'lotid']);
    }
}
