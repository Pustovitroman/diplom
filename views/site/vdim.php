<?php
namespace app\controllers\SiteControlLers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\base\Model;

use yii\helpers\Html;
use yii\db\ActiveRecord;
use yii\widgets\ActiveForm;
use app\models\News;
use yii\widgets\LinkPager;
use app\components\MyWidget;

?>


  <div class="container">

    <div class="row">

        <div class="col-md-3">

	 <ol class="rounded">
	  
	        <?php foreach ($categorys as $row){ ?>
			
	           <li>
	           <a id="<?=$row['id']?>" href="/vdim?id=<?=$row['id']?>"><?=$row['name']?></a>
	           </li>
	
	
	        <?php } ?>
	  
	 
	</ol>
           
        </div>

        <div class="col-md-9">

            <div class="thumbnail">
                <img class="img-responsive" src="web/uploads/categorys/category_2.jpg" alt="">
                <div class="caption-full">

                    <h3><?=$category['name']?></h3>


                    <p><?=$category['text_cat']?></p>
                </div>

            </div>


        </div>

    </div>

</div>


<div class="row area">
                
                
        <?php foreach ( $products as $row){ ?>
		
            
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-1">
                    <div class="product_col">
                        <a id="<?=$row['id']?>" href="/product?id=<?=$row['id']?>"><img src="/web/uploads/product/<?=$row['image']?>" ></a>
                        <div class="product_col_text">
                            <a id="<?=$row['id']?>" href="/product?id=<?=$row['id']?>"><h3><?=$row['name']?></h3></a>
                            <span style="color:red"><b><?=$row['price']?> грн.</b></span>
                        </div>
                        <div class="">
                            <p> <a class="add-to-cart" data-id="<?=$row['id']?>" href="/cart/add?id=<?=$row['id']?>"><button type="button"   class="btn btn-primary btn-block  ">Додати в корзину</button></a></p>
                        </div>
                    </div>

                </div>
           
           
        	<?php } ?>

        <?= LinkPager::widget(['pagination' => $pagination]) ?>