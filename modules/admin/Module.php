<?php

namespace app\modules\admin;

use Yii;
use yii\filters\AccessControl;
use app\models\User;
use yii\web\IdentityInterface;


class Module extends \yii\base\Module
{
    
    public $layout = '/main-original';
    
    public $controllerNamespace = 'app\modules\admin\controllers';

  	 public function beforeAction($action){

        if (!parent::beforeAction($action)) {
            return false;
        }

        if (!Yii::$app->user->isGuest && Yii::$app->user->identity->isAdmin){
            return true;
        } else {
            Yii::$app->getResponse()->redirect(Yii::$app->getHomeUrl());
            //для перестраховки вернем false
            return false;
       		 }
	    }
 

    public function init()
    {
        parent::init();

     
    }
    
    

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}
