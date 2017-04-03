<?php

namespace app\controllers;


use Yii;
use yii\base\Model;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Login;
use app\models\ContactForm;
use app\models\Registry;
use app\models\User;
use app\models\Categorys;
use app\models\Products;
use app\models\CommentForm;
use app\models\SignupForm;
use app\models\Comments;
use app\models\Section;
use yii\data\Pagination;


class SiteController extends Controller
{

     public $layout = '/main_magazin.php';
    
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    
    
    public function actionIndex(){
    $new=Products::find()->where('status="top"');
    $pagination = new Pagination([
    'defaultPageSize' => 10,
    'totalCount' => $new->count(),
    ]);
    $post = $new->orderBy('id')
        ->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();
    return $this->render('index', [
        'post' => $post,
        'pagination' => $pagination,

    ]);
    }
    
	public function actionLogout(){
        if(!Yii::$app->user->isGuest) {
        Yii::$app->user->logout();
        return $this->goHome();
        }
    }


    public function actionLogin()
    {
	if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
	
	$model = new Login();
	if (Yii::$app->request->post()) {
		$model->attributes=Yii::$app->request->post('Login');
		
		if($model->validate())
		{
		Yii::$app->user->login($model->getUser());
		return $this->goHome();
		}
	}
	return $this->render('login', ['model' => $model,]);
    }




    public function actionRegistry(){
    $model = new Registry();
    if( $model->Load(Yii::$app->request->post()) ) {
       if($model->validate()&&$model->registry() ){
        Yii::$app->session->setFlash('key','Ви зареєстровані, перейдіть на головну !');
        return $this->refresh ();
    } else {
         Yii::$app->session->setFlash('key2','Помилка');
    }}
       return $this->render('registry',['model'=>$model]);
    }


	public function actionProduct($id){
    	$id=Yii::$app->request->get();
    	$post = Products::findOne($id);
    	
    	$comment = Comments::find()->where(['products_id' => $id,'status' =>0])->orderBy('rating')->limit(5) ->all();
   	$commentForm = new CommentForm();
   	
   	 return $this->render('product', [
        'comment' => $comment,
        'post' => $post,
        'commentForm' => $commentForm,

    ]);
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
	
	
	  
	    
	    public function actionKantstovari($id){
	    
	   
		   $news=Products::find()->where(['categorys_id' => ($id)]);
	    $pagination = new Pagination([
	    'defaultPageSize' => 8,
	    'totalCount' => $news->count(),
	    ]);
	   $products = $news->orderBy('id')
	        ->offset($pagination->offset)
	        ->limit($pagination->limit)
	        ->all();
	    $category = Categorys::findOne(['id' => $id]);
	     $categorys = Categorys::findAll(['section_id' =>(1)]);
	   
	    
	   
		return $this->render('kartini', [
	        'products' =>  $products,
	        'category' =>  $category,
	        'categorys' =>  $categorys,
 		'pagination' => $pagination,
    		]); 
		
	}    	
		
	 public function actionKartini($id){
	      $news=Products::find()->where(['categorys_id' => ($id)]);
	    $pagination = new Pagination([
	    'defaultPageSize' => 8,
	    'totalCount' => $news->count(),
	    ]);
	   $products = $news->orderBy('id')
	        ->offset($pagination->offset)
	        ->limit($pagination->limit)
	        ->all();
	    $category = Categorys::findOne(['id' => $id]);
	     $categorys = Categorys::findAll(['section_id' =>(2)]);
	   
		return $this->render('kartini', [
	        'products' =>  $products,
	        'category' =>  $category,
	        'categorys' =>  $categorys,
 		'pagination' => $pagination,
    		]); 	
	}    	
	
	public function actionIgrashki($id){
	    $news=Products::find()->where(['categorys_id' => ($id)]);
	    $pagination = new Pagination([
	    'defaultPageSize' => 8,
	    'totalCount' => $news->count(),
	    ]);
	   $products = $news->orderBy('id')
	        ->offset($pagination->offset)
	        ->limit($pagination->limit)
	        ->all();
	    $category = Categorys::findOne(['id' => $id]);
	     $categorys = Categorys::findAll(['section_id' =>(3)]);
	   
		return $this->render('igrashki', [
	        'products' =>  $products,
	        'category' =>  $category,
	        'categorys' =>  $categorys,
 		'pagination' => $pagination,
    		]); 	
	}    	
	
	
	public function actionVdim($id){
	    $news=Products::find()->where(['categorys_id' => ($id)]);
	    $pagination = new Pagination([
	    'defaultPageSize' => 8,
	    'totalCount' => $news->count(),
	    ]);
	   $products = $news->orderBy('id')
	        ->offset($pagination->offset)
	        ->limit($pagination->limit)
	        ->all();
	    $category = Categorys::findOne(['id' => $id]);
	     $categorys = Categorys::findAll(['section_id' =>(4)]);
	   
		return $this->render('vdim', [
	        'products' =>  $products,
	        'category' =>  $category,
	        'categorys' =>  $categorys,
 		'pagination' => $pagination,
    		]); 	
	}    	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
