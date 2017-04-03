<?php

namespace app\controllers\CartControlLers;


use Yii;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\Order;
use yii\helpers\ArrayHelper;
use yii\swiftmailer\Mailer;




$this->title = 'Оформлення замовлення';
$this->params['breadcrumbs'][] = $this->title;
?>

    <h1><?= Html::encode($this->title) ?></h1>
 
<?php if (!empty($session['cart'])):?>
	<div class="table-responsive "  >
	<table class="table table-hover table-striped modal-body" >
		<thead>
			<tr>
			<th>Фото</th>
			<th>Назва товару</th>
			<th>Кількість</th>
			<th>Ціна</th>
			<th>Разом</th>
		
			<tr>
		
		</thead>
		<tbody>
		<?php foreach ($session['cart'] as $id=>$item):?>
			<tr>
			<td><img width="100" height="80" src="/web/uploads/product/<?=$item['image'] ?>"></td>
			<td><?=$item['name'] ?></td>
			<td><?=$item['qty'] ?></td>
			<td><?=$item['price'] ?></td>
			<td><?=$item['price']*$item['qty']?></td>
			
			</tr>
		
		
		<?php endforeach ?>
		<tr>
			<td colspan="4">Всього:</td>
			<td><?=$session['cart.qty'] ?> шт.</td>
		</tr>
		<tr>
			<td colspan="4">На суму</td>
			<td><?=$session['cart.sum'] ?> грн.</td>
		</tr>
		<tr>
			<td colspan="4">
			<div class="view-form-body">
			<div class="view-form">
			
				    <h3>Введіть ваші дані</h3>
				
				    <div class="article-form">
				
				    <?php $form = ActiveForm::begin(); ?>
				
				    <?= $form->field($order, 'name')->label('Як Вас звати ?'); ?>
				
				    <?= $form->field($order, 'phone')->label('Ваш телефон'); ?>
				
				    <?= $form->field($order, 'email')->label('Ваш email (це поле за бажанням !)'); ?>
				    
				    <?= $form->field($order, 'address')->label('Адреса за бажанням, уточнимо по телефону!');?>
				    
				     <?= Html::submitButton ('Додати замовлення',['class'=>'btn btn btn-primary'])?>
				    <?php ActiveForm::end(); ?>
				
			
			</div>
			</div>
			</td>
			
		</tr>
		
		
		</tbody>

	</div>



<?php else:?>
<h3>Корзина пуста</h3>

<?php endif; ?>
  

				<?php if(Yii::$app->session->hasFlash('key')): ?>
	
				  	<div class="alert alert-success alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <?php  echo Yii::$app->session->getFlash('key'); ?>
				</div> 
				<?php endif;?>  
				<?php if(Yii::$app->session->hasFlash('key2')): ?>
				
				  	<div class="alert alert-success alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <?php  echo Yii::$app->session->getFlash('key2'); ?>
				</div> 
				<?php endif;?>


