<?php


use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\User;
use app\models\SignupForm;
use yii\widgets\ActiveForm;
use app\models\Subscrib;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>





    <div class="wrap">

        <header>
            <div class="header-area">
                <div class="header-top">
                    <?php if(Yii::$app->user->isGuest):?>

                        <a href="/site/login">Вхід</a> &nbsp<a href="/site/registry">Реєстрація</a>
                    <?php else: ?>

                        <?= Html::beginForm(['/site/logout'], 'post')
                        . Html::submitButton(
                            'Вихід (' . Yii::$app->user->identity->name . ')',
                            ['class' => 'btn btn-success logout']
                        )
                        . Html::endForm()?>

                    <?php endif; ?>
                </div>

                <div class="header-midle">

                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12   ">
                            <div id="custom-bootstrap-menu" class="navbar navbar-default " role="navigation">
                                <div class="container-fluid">
                                    <div class="navbar-header"><a href="/"><img src="/web/uploads/logo.png" alt="" /></a>
                                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                                        </button>
                                    </div>
                                    <div class="collapse navbar-collapse navbar-menubuilder">
                                        <ul class="nav navbar-nav">
                                            <li><a href="/"><b>ГОЛОВНА</b></a></li>
                                            <li class="dropdown">
                                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><b>КАНЦТОВАРИ</b>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="/kantstovari?id=1">Зошити</a></li>
                                                    <li><a href="/kantstovari?id=2">Готовальня, циркулі</a></li>
                                                    <li><a href="/kantstovari?id=3">Папір та вироби з паперу</a></li>
                                                    <li><a href="/kantstovari?id=4">Приладдя для письма</a></li>
                                                     <li><a href="/kantstovari?id=5">Діловодство</a></li>
                                                    <li><a href="/kantstovari?id=6">Для дитячої творчості та розвитку</a></li>
                                                     <li><a href="/kantstovari?id=7">Ранці, рюкзаки</a></li>
                                                    <li><a href="/kantstovari?id=8">Книги, атласи, дитячі книги</a></li>
                                                    <li><a href="/kantstovari?id=9">Аксесуари для школи</a></li>
                                                   
                                                </ul>
                                            </li>

                                            <li class="dropdown">
                                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><b>КАРТИНИ</b>
                                                </a>
                                                <ul class="dropdown-menu">
                                                     <li><a href="/kartini?id=10">Модульні картини</a></li> 
                                                     <li><a href="/kartini?id=11">Картини Вовки</a></li>   
                                                     <li><a href="/kartini?id=12">Картини Природа</a></li>  
                                                     <li><a href="/kartini?id=13">Картини пейзаж</a></li>  
                                                     <li><a href="/kartini?id=14">Картини Квіти</a></li>  
                                                     <li><a href="/kartini?id=15">Картини Море, Кораблі</a></li>  
                                                   
                                                </ul>
                                            </li>
                                            <li class="dropdown">
                                                <a tabindex="-1" class="dropdown-toggle" data-toggle="dropdown" href="#"><b>ІГРАШКИ</b>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="/igrashki?id=16">Замки, карети</a></li>  
                                                     <li><a href="/igrashki?id=17">Коляски, ліжечка</a></li> 
                                                    <li><a href="/igrashki?id=18">Побутова техніка</a></li>
                                                    <li><a href="/igrashki?id=19">Розвиваючі іграшки</a></li>
                                                    <li><a href="/igrashki?id=20">Роботи, машини</a></li>
                                                    <li><a href="/igrashki?id=21">Набори ігрові для дівчаток</a></li>
                                                    <li><a href="/igrashki?id=22">Ляльки</a></li>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="dropdown">
                                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><b>ДЛЯ ДОМУ</b>
                                                </a>
                                                <ul class="dropdown-menu">
                                                     <li><a href="/vdim?id=23">Парасольки</a></li>
                                                     <li><a href="/vdim?id=24">Сумки для сім'ї</a></li>
                                                </ul>
                                            </li>
                                            

                                        </ul>
                                        <form method="get"  class="navbar-form navbar-left" action="<?= \yii\helpers\Url::to(['search/search'])?>"  >

                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="q" placeholder="Пошук на сайті">
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-default" type="submit">
                                                            <i class="glyphicon glyphicon-search"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
					<div class="cart-div"><a href="#"> <button type="button" id="cart-button" class="btn btn-primary "><span style="font-size:14px" class="glyphicon glyphicon-shopping-cart"></span > Корзина </button></a></div>
                                    </div>
                                </div>
                            </div>
                            


                        </div>
                    </div>
                </div>
            </div>

            <div class="content">
                <?= $content ?>
            </div>
    	</div>
<div id="form" class="mypanel">
<button style="float: right;" type="button" id="close" class="glyphicon glyphicon-remove"></button>
<h1>Уважно слухаємо !</h1>
<?php 
$model = new Subscrib();
$form = ActiveForm::begin([
            'method' => 'post',
            'action' => ['subscrib/create'],
        ]) ?>
        

            <?= $form->field($model, 'name' )->label ('Як Вас звати?')?>
            <?= $form->field($model, 'phone')->label ('Ваш телефон') ?>
             <?= $form->field($model, 'text_input')->textarea(['rows' => 2])->label('Додати повідомлення'); ?>
             
             <?= Html::submitButton ('Додати заявку',['class'=>'btn btn-primar-contact'])?> 

      
<?php ActiveForm::end() ?>

</div>
 
 
 
 
    <footer class="footer" >
    
    
    
    <div class="contact">
  <button type="button"  id ="open" class="bt btn-block btn-primar ">Виникають питання ? Натисніть тут щоб написати нам або замовити зворотній дзвінок </button>
    </div>
  <div class="contact-phone">
           <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3  ">
              <span><h4 style="color:#ffffff">Наша адреса:</h4>        </span>
                
                Украина, 09440 смт.Ставище,<br>
                 вул.Сергія Цимбала.
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3  ">
               	<span><h4 style="color:#ffffff">Наші контакти::</h4></span>
               	096-17-21-484 <br>
              
                dimditki@gmail.com
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3  ">
                <span><h4 style="color:#ffffff">Корисна інформація:</h4>        </span>
                
                Доставка та оплата<br>
             
                 Повернення товару<br>
                 
            </div>
		<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3  ">
                <span><h4 style="color:#ffffff">Додатково:</h4>        </span>
                
                Наш блог<br>
                Рекомендації<br>
            </div>

  </div>      
    
    
   
 </footer>
<?php
\yii\bootstrap\Modal::begin ([
	'header' => '<h2>Корзина</h2>',
	'id' => 'cart',
	'size' => 'modal-lg',
	'footer' => '<button type="button" class="btn btn-default" data-dismiss="modal">Продовжити покупку</button>
        <a href="/cart/view" type="button" class="btn btn-primary">Оформити замовлення</a>
        <button type="button" data-id="<?= $id ?>" id="clear" class="btn btn-danger" > Очистити корзину</button>'
]);
\yii\bootstrap\Modal::end();
?>


    <?php $this->endBody() ?>
    </body>
    </html>

<?php $this->endPage() ?>
