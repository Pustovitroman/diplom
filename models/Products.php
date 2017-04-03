<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\base\Model;
use app\models\ProductsForm;
use yii\web\IdentityInterface;


class Products extends ActiveRecord
{
    
    public $upload_image;
    
    		
    	
    	
   
	public static function tableName()
	{
        	return 'Products';
        }
	
 public function rules()
    {
    return [
        
        [['name', 'text_intro', 'price' , ], 'required'],
         [['name', 'text_intro',  ], 'string'],
         [['image'], 'file', 'extensions' => ['jpg','png'],'checkExtensionByMimeType'=>false], 
         [['upload_image'], 'file', 'extensions' => 'png, jpg', 'skipOnEmpty' => true],
         [['categorys_id'], 'default', 'value' => '0'],
         
        
    ];
    }

	public function createProducts()
    {
      	
        $products = new Products();
        $products->title=$this->name;
        $products->text=$this->text_intro;
        $products->price=$this->price;
        $products->image=$this->image;
        $products->categorys_id=$this->categorys_id;
        return $products->save()? $products : null;
    }


}
  
  	
    

