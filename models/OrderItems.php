<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\base\Model;
use app\models\Order;
use app\models\OrderItems;
use yii\web\IdentityInterface;


class OrderItems extends ActiveRecord
{
    
   
    	
   
	public static function tableName()
	{
        	return 'OrderItems';
        }
	
	public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'Order_id'])
            ->via('orderItems');
    }
	
	
	
	
  public function rules()
    {
    return [
        
         [['Order_id', 'Product_id', 'name', 'price', 'qty_item','sum_item'], 'required'],
        
         
         
        
    ];
    }

	public function getOrderItems()
    {
        return $this->hasMany(OrderItem::className(), ['Order_id' => 'id']);
    }

}
  