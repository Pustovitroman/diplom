<?php

namespace app\controllers;


use Yii;
use yii\base\Model;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Cart;
use app\models\Products;
use app\models\CommentForm;
use app\models\Comments;
use app\models\Order;
use app\models\OrderItems;
use yii\data\Pagination;
use yii\swiftmailer\Mailer;


class CartController extends Controller
{

     public $layout = '/main_magazin.php';
    
   
    
    

	public function actionAdd($id){
    	$id=Yii::$app->request->get('id');
    	$qty = (int)Yii::$app->request->get('qty');
    	$qty= !$qty ? 1 : $qty;
    	$product=Products::findOne($id);
    	if(empty($product))return false;
    	$session = Yii::$app->session;
    	$session->open();
    	$cart = new Cart ();
    	$cart->addToCart($product, $qty);
    	$this->layout=false;
    	 return $this->render('cart-modal', compact('session'));
        
	 }
	
	public function actionClear(){
    	$session = Yii::$app->session;
    	$session->open();
    	$session->remove('cart');
        $session->remove('cart.qty');
        $session->remove('cart.sum');
        $this->layout=false;
    	return $this->render('cart-modal', compact('session'));
	 }
	
	public function actionDelItem(){
    	$id=Yii::$app->request->get('id');
    	$session = Yii::$app->session;
    	$session->open();
    	$cart = new Cart ();
    	$cart->recalc($id);
    	$this->layout=false;
    	 return $this->render('cart-modal', compact('session'));
        
	 }
	
	public function actionShow(){
    	$id=Yii::$app->request->get('id');
    	$session = Yii::$app->session;
    	$session->open(); 	
    	$this->layout=false;
    	 return $this->render('cart-modal', compact('session'));
        
	 }
	
	public function actionView(){
    	$session = Yii::$app->session;
    	$session->open();
    	$order = new Order();
    	if ($order->Load(Yii::$app->request->post())){
    		$order->qty= $session['cart.qty'];
    		$order->sum= $session['cart.sum'];
    		
    		if($order->save() ){
    		$this->saveOrderItems($session ['cart'], $order->id);
        Yii::$app->session->setFlash('key','Замовлення отримано, чекайте дзвінка менеджера !');
        	Yii::$app->mailer->compose('order', ['session' => $session])
        	    ->setFrom(['admin@dimditki.com.ua'=>'DimDitki.com.ua'])
		    ->setTo($order->email)
		    ->setSubject('Ваше замовлення ')
		    ->send();
        	Yii::$app->mailer->compose('order', ['session' => $session])
        	    ->setFrom(['admin@dimditki.com.ua'=>'dimditki.com.ua нове замовлення'])
		    ->setTo(Yii::$app->params['adminEmail'])
		    ->setSubject($order->name,$order->phone)
		    ->send();
        	
        	
        	$session->remove ('cart');
        	$session->remove ('cart.qty');
        	$session->remove ('cart.sum');
        	
        return $this->refresh ();
         } else {
         Yii::$app->session->setFlash('key2','Помилка, замовлення не отримано !');
          }}
    	
    	 return $this->render('view', compact('session', 'order') );
	 }
	
	protected function saveOrderItems ( $items, $order_id){
		foreach ($items as $id=> $item){
		$order_items = new OrderItems();
		$order_items->Order_id = $order_id;
		$order_items->Product_id = $id;
		$order_items->name = $item ['name'];
		$order_items->price = $item ['price'];
		$order_items->qty_item = $item ['qty'];
		$order_items->sum_item = $item ['qty'] * $item ['price'];
		$order_items->save();
		}

	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function actionComment($id){
    
   	  	$model = new CommentForm();
   	
   		if(Yii::$app->request->isPost)
   		{
   		$model->load(Yii::$app->request->post());
   		if($model->saveComment($id))
   		{
   		 return $this->redirect(['site/pages','id'=>$id]);
   		}
   	
   	}
   	
   	
    }
	
	
	
	
	
	
	
	
	
}
