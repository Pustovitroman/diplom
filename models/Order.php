<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\base\Model;
use app\models\OrderItems;
use app\models\Order;
use yii\web\IdentityInterface;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

class Order extends ActiveRecord
{
   
   
	public static function tableName()
	{
        	return 'Order';
        }
	
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['create_date'],
                   
                ],
                // если вместо метки времени UNIX используется datetime:
                'value' => new Expression('NOW()'),
            ],
        ];
    }





   public function rules()
    {
    return [
        
         [['name', 'phone','qty','sum'  ], 'required'],
         [['address', ], 'string'],
         ['email', 'email'],
         
        
    ];
    }

	public function getOrderItems()
    {
        return $this->hasMany(OrderItems::className(), ['Order_id' => 'id']);
    }

}
  