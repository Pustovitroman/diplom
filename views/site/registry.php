<?php
namespace app\controllers\SiteControlLers;
namespace app\models\RegistryForm;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\base\Model;

use yii\helpers\Html;
use yii\db\ActiveRecord;
use yii\widgets\ActiveForm;

 




?>




  
<div class="area-login">
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


	<h1>Реєстрація</h1>

    <?php $form = ActiveForm::begin(); ?>


        <?= $form->field($model, 'name')->label('Як Вас звати?') ?>
        <?= $form->field($model, 'email')->label('Ваш email') ?>
        <?= $form->field($model, 'password')->textInput(['maxlength' => true])->passwordInput()->label('Ваш пароль для входу')?>
        

        <?= Html::submitButton ('Зареєструватись',['class'=>'btn btn-success'])?>
    <?php ActiveForm::end(); ?>

  
    
    
</div>
