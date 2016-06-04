<?php
namespace backend\Models;

class Product extends \common\models\Product{
    public function getFullname(){
        return $this->prodcode.' '.$this->prodname;
    }
    public function getPlan(){
        return $this->hasOne(Plan::className(), ['recid'=>'planid']);
    }
   public function getGroup(){
        return $this->hasOne(Productgroup::className(), ['recid'=>'prodgroupid']);
    }
   public function getCategory(){
        return $this->hasOne(Productcategory::className(), ['recid'=>'prodcategoryid']);
    }
   public function getUnit(){
        return $this->hasOne(Unit::className(), ['recid'=>'inventunit']);
    }
}


