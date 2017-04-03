
	<center>
	<table >
		<thead>
			<tr>
			
			<th>Назва товару</th>
			<th>Кількість</th>
			<th>Ціна</th>
			<th>Разом</th>
		
			<tr>
		
		</thead>
		<tbody>
		<?php foreach ($session['cart'] as $id=>$item):?>
			<tr>
			
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
		
		
		
		</tbody>
	
	</center>



