<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\base\Model;
use app\models\ProductsForm;
use yii\web\IdentityInterface;


class Section extends ActiveRecord
{
    
    static $upload_image;
    
    		
    	
    	
   
	public static function tableName()
	{
        	return 'Section';
        }
	
 public function rules()
    {
    return [
        
        [['name', 'text_intro',  ], 'required'],
         [['name', 'text_intro',  ], 'string'],
         [['image'], 'file', 'extensions' => ['jpg','png'],'checkExtensionByMimeType'=>false], 
         [['upload_image'], 'file', 'extensions' => 'png, jpg', 'skipOnEmpty' => true],
         
         
        
    ];
    }

	public function createSection()
    {
      	
        $section = new Section();
         $section->title=$this->name;
         $section->text=$this->text_intro;
         $section->image=$this->image;
         
        return  $section->save()?  $section : null;
    }


}
  
  	
    

