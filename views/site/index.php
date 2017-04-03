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


<div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-12 ">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">

                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                            <li data-target="#myCarousel" data-slide-to="3"></li>
                        </ol>


                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img src="/web/uploads/menu-top.jpg" >
                                <div class="carousel-caption d-none d-md-block text-slider">
                                    <h3>Товари для дітей</h3>
                                    <p>Товари для школи, дому. Канцтовари, рюкзаки, все для школи, а також велика кількість іграшок для дому. </p>
                                </div>
                            </div>

                            <div class="item">
                                <img src="/web/uploads/slide 4.jpg" >
                            </div>

                            <div class="item">
                                <img src="/web/uploads/menu-top.jpg" >

                            </div>

                            <div class="item">
                                <img src="/web/uploads/menu-top.jpg" >
                            </div>
                        </div>

                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                            <span style="color:#428bca" class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                            <span style="color:#428bca"class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>


                </div>
</div>

<div class="row">
 	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-1 ">
             <div class=" ">
                 <h2>Вітаємо Вас в нашому магазині !</h2>
                    <p>DimDitki - це товари для дому і діток. </p>
             </div>
        </div>
</div>

<div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 ">
                    <div class="area-block">
                        <span class="glyphicon glyphicon-shopping-cart" style="font-size:80px;color:#ffffff;"></span>
                        <h4>Швидка покупка</h4>
                        <p>Ми обробляємо Ваш заказ максимально бистро. </p>

                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 ">
                    <div class="area-block">
                        <span class="glyphicon glyphicon-road" style="font-size:80px;color:#ffffff;"></span>
                        <h4>Безкоштовна доставка*</h4>
                        <p>*Доставка безкоштовно при сумі замовлення від 600 грн.</p>

                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 ">
                    <div class="area-block">
                        <span class="glyphicon glyphicon-piggy-bank" style="font-size:80px;color:#ffffff;"></span>
                        <h4>Ви реально економите</h4>
                        <p>Наші ціни досить помірні. Перевірте та впевнетесь</p>

                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 ">
                    <div class="area-block">
                        <span class="glyphicon glyphicon-thumbs-up" style="font-size:80px;color:#ffffff;"></span>
                        <h4>Гарантія якості</h4>
                        <p> Ви завжди можете повернути товар і отримати свої кошти</p>

                    </div>
                </div>
</div>

<div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-1 ">
                    <div class="product_col_text">
                        <h2>Наші топ товари</h2>
                        <p>Найбільш популярні товари. Тут вибрані новари із різних категорій.</p>
                    </div>
                </div>
</div>



<div class="row area">
                
                
        <?php foreach ($post as $row){ ?>
		
            
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
    		
               
            
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-1 ">
                    <div class=" ">
                        <h2 style="color:red;" >Спеціальна пропозиції знижка 40% !!!</h2>
                        <p>Товари зі знижкою 40% (Акція діє до 12.07.2017 року)  </p>

                    </div>
                     
                </div> 
            </div>

 <div class="slider5">
  <div class="slide"><a  href="/product?id=4"><img width="300" height="150" src="http://dimditki.com.ua/web/uploads/product/leopard_x3.jpg"></a></div>
  <div class="slide"><a  href="/product?id=4"><img width="300" height="150" src="http://dimditki.com.ua/web/uploads/product/leopard_x3.jpg"></a></div>
  <div class="slide"><a  href="/product?id=4"><img width="300" height="150" src="http://dimditki.com.ua/web/uploads/product/leopard_x3.jpg"></a></div>
  <div class="slide"><a  href="/product?id=4"><img width="300" height="150" src="http://dimditki.com.ua/web/uploads/product/leopard_x3.jpg"></a></div>
  <div class="slide"><a  href="/product?id=4"><img width="300" height="150" src="http://dimditki.com.ua/web/uploads/product/leopard_x3.jpg"></a></div>
  <div class="slide"><a  href="/product?id=4"><img width="300" height="150" src="http://dimditki.com.ua/web/uploads/product/leopard_x3.jpg"></a></div>               
</div>
</div>




