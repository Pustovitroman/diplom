<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\UploadedFile;
use app\models\Categorys;
use yii\helpers\ArrayHelper;



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
    <h1>Додати товар</h1>

    <div class="article-form">

    <?php $form = ActiveForm::begin((['options' => ['enctype' => 'multipart/form-data']])); ?>

    <?= $form->field($model,'name')->label('Назва товару'); ?>

    <?= $form->field($model, 'text_intro')->textarea(['rows' => 6])->label('Опис товару'); ?>

    <?= $form->field($model, 'price')->label('Ціна'); ?>
    
    <?= $form->field($model, 'image')->fileInput()->label('Додайте фото');?>
    
    
    
    <?=
    
    
   $form->field($model, 'categorys_id')->dropDownList(
            $items,           
            ['prompt'=>'Виберіть категорію']    
        )->label('Оберіть категорію');
    
   ?>
    
     <?= Html::submitButton ('Відправити',['class'=>'btn btn-success'])?>
    <?php ActiveForm::end(); ?>



</div>

</div>
