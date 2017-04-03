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


class SearchController extends Controller
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
    
    
    public function actionSearch(){
    $q=Yii::$app->request->get();
    $new=Products::find()->where(['like','name', $q ]);
    
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
        'q'=>'$q',
        
        

    ]);
    }
    
	
}
