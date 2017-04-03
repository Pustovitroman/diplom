<?php

namespace app\modules\admin\controllers;
use yii\db\ActiveRecord;
use app\models\Category;
use app\models\ImageUpload;
use app\models\Tag;
use Yii;
use app\models\Article;
use app\models\ArticleSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\models\ProductsForm;
use app\models\Products;
use yii\data\Pagination;
use app\models\Categorys;




class ProductsController extends Controller
{
    
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    
    public function actionIndex()
    {
        
    $news=Products::find();
    $pagination = new Pagination([
    'defaultPageSize' => 5,
    'totalCount' => $news->count(),
    ]);
    $post = $news->orderBy('id')
        ->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();
    return $this->render('index', [
        'post' => $post,
        'pagination' => $pagination,

    ]);
    }

    
       public function actionCreate()
    {
      $model = new Products();
    
    
     $items = ArrayHelper::map(Categorys::find()->all(), 'id', 'name');



    if(Yii::$app->request->isPost){
    	 $model->load(Yii::$app->request->post());
        $image = \yii\web\UploadedFile::getInstance($model, 'image');

        if(!empty($image)){
            $image_name = $image->name;
            $model->image = $image_name;
        }

        if ($model->validate() && $model->save()) {

            
            if(!empty($image)){
                $image->saveAs('uploads/product/'. $image_name);
            }

            return $this->redirect('index');
        }
    }
    return $this->render('create', [
        'model' => $model,
         'items' => $items,
    ]);
       
    }

 	
   
        public function actionUpdate($id)
{
    $model = Products::findOne($id);
    $model->load(Yii::$app->request->post());
    $items = ArrayHelper::map(Categorys::find()->all(), 'id', 'name');

    if(Yii::$app->request->isPost){
        
        $upload_image = \yii\web\UploadedFile::getInstance($model, 'upload_image');

     
        if(!empty($upload_image)){
            $image_name = $upload_image->name;
            $model->image = $image_name;
        }

    
        if ($model->validate() && $model->save()) {

        
            if(!empty($upload_image)){
                $upload_image->saveAs('uploads/' . $image_name);
            }

            return $this->redirect('index');
        }
    }
    return $this->render('update', [
        'model' => $model,
        'items' => $items,
    ]);
}
    
    public function actionDelete($id = false)
     	{
        if (isset($id)) {
        $model = Products::findOne($id);
        
            if ($model->delete()) {
                return $this->redirect('index');
            }
        } else {
            return $this->refresh ();
        }
     	}
    
  

        
        
        
}
    
    

    
    

    
   

