<?php



use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\base\Model;

use yii\helpers\Html;
use yii\db\ActiveRecord;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\models\Section;
use yii\widgets\LinkPager;


?>
<style>
table,td,tr,th {     
        padding: 7px;
        border: 1px solid #888;}
   
table {width: 100%;}
    
</style>

<h3>Розділи меню</h3>
<div class="table">
  <a href="<? echo Url::to(['section/create', ]) ?>"><button type="button" class="btn btn-primary">Додати розділ</button></a><br>
  <br>
  
<table>
    <tr>
        <th>ID</th>
        <th>Назва</th>
        <th>Опис розділу</th>
        
        <th>Фото</th>
        <th></th>
        
    </tr>
    <?php foreach ($post as $row) {  ?>
        <tr>
            <td><?=$row['id']?></td>
             <td><?=$row['name']?></td>
            <td><?=$row['text_intro']?></td>
            
           <td><?=$row['image']?></td>
            
        <td>  <a href="<? echo Url::to(['section/update', 'id' => $row['id']]) ?>"> <button type="button" class="glyphicon glyphicon-pencil"></button></a> <a href="<? echo Url::to(['section/delete', 'id' => $row['id']]) ?>" data-method="post" onclick="return confirm('Ви дійсно хочете видалити?')" ><button type="button" class="glyphicon glyphicon-trash"></button></a> </td>
        
        
        
        
        
        </tr>
    <?php } ?>
    
    
</table>
    <?= LinkPager::widget(['pagination' => $pagination]) ?>
</div>



