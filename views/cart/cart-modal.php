<?php if (!empty($session['cart'])):?>
	<div class="table-responsive">
	<table class="table table-hover table-striped">
		<thead>
			<tr>
			<th>Фото</th>
			<th>Назва товару</th>
			<th>Кількість</th>
			<th>Ціна</th>
			<th>Разом</th>
		<th> <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
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
			<td><span data-id="<?= $id ?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td>
			</tr>
		
		
		<?php endforeach ?>
		<tr>
			<td colspan="5">Всього:</td>
			<td><?=$session['cart.qty'] ?> шт.</td>
		</tr>
		<tr>
			<td colspan="5">На суму</td>
			<td><?=$session['cart.sum'] ?> грн.</td>
		</tr>
		
		
		
		</tbody>
	
	</div>



<?php else:?>
<h3>Корзина пуста</h3>
<?php endif; ?>