<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;

?>
 
<br>

 <div class="product-details">
	<div class="col-sm-5">
		<div class="view-product">
			
			<img width="100%" height="auto" src="web/uploads/product/<?=$post['image']?>"
			<span><span>
			<p></p>
			<p></p>
			
		</div>
		

	</div>
	<div class="col-sm-7">
		<div class="product-information">
			
			<h1><?=$post['name']?></h1><br>
			<p style="color:red;font-size:20px";>Ціна: <?=$post['price']?> грн.</p>
			<br>
			<span>
				
				<label>Кількість:</label>
				<input type="text" size="5" value="1" id="qty" />
				 &nbsp;&nbsp;<a href="#" data-id="<?=$post['id']?>" class="btn btn-primary btn-cons add-to-cart">Додати до кошика</a>
			</span>
			<br><br>
			<hr>
			<p><?=$post['text_intro']?></p>
			
			
			
		</div><!--/product-information-->
	</div>
	

	
	
	
</div>



