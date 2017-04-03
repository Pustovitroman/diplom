<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\UploadedFile;




?>
<br>
<br>
<br>

<div class="article-create">
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
      <h1>Додати категорію</h1>

    <div class="article-form">

    <?php $form = ActiveForm::begin(); ?>
	<?=$form->field($model, 'section_id')->dropDownList(
	            $items,           
	            ['prompt'=>'Виберіть розділ']    
	        )->label('Оберіть розділ');
	    
	   ?>
    <?= $form->field($model, 'name')->textInput()->label('Вкажіть назву'); ?>
    <?=$form->field($model, 'text_cat')->textInput()->label('Опис категорії'); ?>
    
    
    
    
     <?= Html::submitButton ('Відправити',['class'=>'btn btn-success'])?>
    <?php ActiveForm::end(); ?>



</div>

</div>
