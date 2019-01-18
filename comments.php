<?php include "LastModified.php";?>
<?php $z = array($_POST['name'],$_POST['city'],$_POST['email'], $_POST['content'],date("d.m.Y H:i"),$_SERVER["REMOTE_ADDR"],$_POST['robot'],$_POST['name1'],$_POST['email1'],$_POST['content1']);
if ($z[0] && $z[1] && $z[2] && $z[3] && $z[5] !== '85.195.116.66' && $z[6] == 'И я тоже' || $z[9]){
mail("mail@linuxtosha.ru", "Отзывы на 'Установка Linux'", $z[4] . "\n" . $z[5] . "\n" . $z[2] . "\n" . $z[0] . "\n". $z[1] . "\n" . $z[3]. "\n" . $z[7] . "\n". $z[8] ."\n". $z[9]);
if(strpos($z[3]. "\n" .  $z[9], 'http://') === false){
$fp = fopen("", "a+");
$mytext = "\n" . $z[4] . "\n" . $z[5] . "\n" . $z[2] . "\n" . $z[0] . "\n". $z[1] . "\n" . $z[3]. "\n" .$z[7] . "\n". $z[8] . "\n" . $z[9];
fwrite($fp, $mytext);
fclose($fp);
$dl ='<center><h2 style="color:green;">Ваш отзыв будет опубликован после проверки администратором сайта.</h2><br><img style="width:37px;height:29px;" src="Comments/phil.gif" alt="Установка Linux"></center><br>';
echo $dl;
return $dl;
Header("Location: ".$_SERVER['PHP_SELF']);
} else {
$dl ='<center><h2 style="color:red;">Что то мне не очень нравится Ваш отзыв!</h2><br><img style="width:32px;height:28px;" src="Comments/old.gif" alt="Установка Linux"></center>';
echo $dl;}
}
?>
<?php
function bbTags($var){
	$bb = array('[b]', '[/b]');
	$tag = array('<b>', '</b>');
	return str_ireplace($bb, $tag, $var);
}
function smile($var){
	$symbol = array(':(brick:',
					':)cossack:',
					':)banana:',
					':)computer:)',
					':(tic-tac-toe:)',
					':(wall:',
					':)tryst:)',
					':(pot:',
					':)puppy:',
					':(horse:',
					':)horseback:',
					':)cuckoo:',
					':)double-bass:',
					':(bicycle:)',
					':)broom:',
					':)rain:',
					':(workman:',
					':)sculptor:',
					':(raker:',
					':)accordion:',
					':)drinks:)',
					':(balloon:');
	$graph = array('<img src="Comments/smiles/comando.gif">',
					'<img src="Comments/smiles/bud.gif">',
					'<img src="Comments/smiles/banana.gif">',
					'<img src="Comments/smiles/computer.gif">',
					'<img src="Comments/smiles/connie.gif">',
					'<img src="Comments/smiles/dash.gif">',
					'<img src="Comments/smiles/dog.gif">',
					'<img src="Comments/smiles/escapejar.gif">',
					'<img src="Comments/smiles/fiona_dog.gif">',
					'<img src="Comments/smiles/horse.gif">',
					'<img src="Comments/smiles/horse2.gif">',
					'<img src="Comments/smiles/kuku.gif">',
					'<img src="Comments/smiles/Laie.gif">',
					'<img src="Comments/smiles/nzd.gif">',
					'<img src="Comments/smiles/phil.gif">',
					'<img src="Comments/smiles/rain.gif">',
					'<img src="Comments/smiles/tnp.gif">',
					'<img src="Comments/smiles/ven.gif">',
					'<img src="Comments/smiles/xsunx.gif">',
					'<img src="Comments/smiles/WhiteVoid.gif">',
					'<img src="Comments/smiles/drinks.gif">',
					'<img src="Comments/smiles/balloon.gif">');
	return str_replace($symbol, $graph, $var);
}
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <title>Отзывы на сайте</title>     
    <meta name="description" content='Отзывы на сайте "Установка операционных систем и программного обеспеченмя Linux."'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="отзыв">
    <link rel="shortcut icon" href="dog.gif" type="image/gif">
    <link rel="stylesheet" href="Gentoo/font/all.css">
    <link rel="stylesheet" type="text/css" href="Comments/bot.css">
  <style>
     body{width:100%;}
     @media handheld and (max-width:980px) {body{width:480px}}
     *,*:after,*:before{-webkit-box-sizing: border-box;-moz-box-sizing:border-box;-ms-box-sizing:border-box;-o-box-sizing:border-box;box-sizing:border-box;padding:0;margin:0;}.clearfix:after{content:"";display:table;clear:both;}
     body{background:url(bg.jpg)fixed;}
     .main{width:100%;margin:0 auto;position:relative;}
     .form-1{width:300px;margin:20px auto 5px;padding:10px;position:relative;box-shadow:0 0 1px rgba(0,0,0,0.3),0 3px 7px rgba(0,0,0,0.3),inset 0 1px rgba(255,255,255,1),inset 0 -3px 2px rgba(0,0,0,0.25);border-radius:5px;background:white;Fallback 
     background:-moz-linear-gradient(#eeefef,#ffffff 10%);background:-ms-linear-gradient(#eeefef,#ffffff 10%);background:-o-linear-gradient(#eeefef,#ffffff 10%);background:-webkit-gradient(linear,0 0,0 100%,from(#eeefef),color-stop(0.1,#ffffff));background:-webkit-linear-gradient(#eeefef,#ffffff 10%);background:linear-gradient(#eeefef,#ffffff 10%);}.field{position:relative;}.field i{left:0px;top:0px;position:absolute;height:36px;width:36px;border-right:1px solid rgba(0,0,0,0.1);box-shadow:1px 0 0 rgba(255,255,255,0.7);color:#777777;text-align:center;line-height:42px;-webkit-transition:all 0.3s ease-out;-moz-transition:all 0.3s ease-out;-ms-transition:all 0.3s ease-out;-o-transition:all 0.3s ease-out;transition:all 0.3s ease-out;pointer-events:none;}
     .form-1 input[type=text],.form-1 input[type=email]{font-family:'Lato',Calibri,Arial,sans-serif;font-size:13px;font-weight:400;text-shadow:0 1px 0 rgba(255,255,255,0.8);width:100%;padding:10px 18px 10px 45px;border:none;box-shadow:inset 0 0 5px rgba(0,0,0,0.1),inset 0 3px 2px rgba(0,0,0,0.1);border-radius:3px;background:#f9f9f9;color:#777;
     -webkit-transition:color 0.3s ease-out;-moz-transition:color 0.3s ease-out;-ms-transition:color 0.3s ease-out;-o-transition:color 0.3s ease-out;transition:color 0.3s ease-out;}
     .form-1 input[type=text]{margin-bottom: 10px;}.form-1 input[type=text]:hover ~ i,.form-1 input[type=email]:hover ~ i{color:#52cfeb;}.form-1 input[type=text]:focus ~ i,.form-1 input[type=email]:focus ~ i{color:#42A2BC;}.form-1 input[type=text]:focus,.form-1 input[type=email]:focus,.form-1 button[type=submit1]:focus{outline:none;}.submit1{width:65px;height:65px;position:absolute;top:61px;right:-25px;padding:10px;z-index:2;background:#ffffff;border-radius:50%;box-shadow:0 0 2px rgba(0,0,0,0.1),0 3px 2px rgba(0,0,0,0.1),inset 0 -3px 2px rgba(0,0,0,0.2);}.submit1:after{content:"";width:10px;height:10px;position:absolute;top:-2px;left:30px;background:#ffffff;box-shadow:0 62px white,-32px 31px white;}
     .form-1 button{width:100%;height:100%;margin-top:-1px;font-size:1.4em;line-height:1.75;color:white;border:none;border-radius:inherit;background:#52cfeb;background: -moz-linear-gradient(#52cfeb,#42A2BC);background:-ms-linear-gradient(#52cfeb,#42A2BC);background:-o-linear-gradient(#52cfeb,#42A2BC);background:-webkit-gradient(linear,0 0,0 100%,from(#52cfeb),to(#42A2BC));background:-webkit-linear-gradient(#52cfeb,#42A2BC);background:linear-gradient(#52cfeb,#42A2BC);
     box-shadow:inset 0 1px 0 rgba(255,255,255,0.3),0 1px 2px rgba(0,0,0,0.35),inset 0 3px 2px rgba(255,255,255,0.2),inset 0 -3px 2px rgba(0,0,0,0.1);cursor:pointer;}
     .form-1 button:hover,.form-1 button[type=submit1]:focus{background:#52cfeb;-webkit-transition:all 0.3s ease-out;-moz-transition:all 0.3s ease-out;-ms-transition:all 0.3s ease-out;-o-transition:all 0.3s ease-out;transition:all 0.3s ease-out;}.form-1 button:active{background:#42A2BC;box-shadow:inset 0 0 5px rgba(0,0,0,0.3),inset 0 3px 4px rgba(0,0,0,0.3);}
     textarea{width:280px;border:5px ridge #52cfeb;font-family:'Lato',Calibri,Arial,sans-serif;font-size:13px;font-weight:400;text-shadow:0 1px 0 rgba(255,255,255,0.8);padding-left:10px;padding-top:10px;box-shadow:inset 0 0 5px rgba(0,0,0,0.1),inset 0 3px 2px rgba(0,0,0,0.1);border-radius:3px;background:#f9f9f9;color:#777;-webkit-transition:color 0.3s ease-out;-moz-transition:color 0.3s ease-out;-ms-transition:color 0.3s ease-out;-o-transition:color 0.3s ease-out;transition:color 0.3s ease-out;}
     /* Оставить отзыв */
     .C-wrapper button span{width:180px;height:auto;margin-left:-96px;padding:10px;left:50%;font-style:italic;font-size:16px;color:#52cfeb;text-shadow:1px 1px 1px rgba(0, 0, 0, 0.1);text-align:center;border:4px solid #52cfeb;text-indent:0;background:rgb(255,255,255);
     border-radius:5px;position:absolute;pointer-events:none;bottom:4px;left:300px;opacity:0;box-shadow:1px 1px 2px rgba(0,0,0,0.1);-webkit-transition:all 0.3s ease-in-out;-moz-transition:all 0.3s ease-in-out;-o-transition:all 0.3s ease-in-out;-ms-transition:all 0.3s ease-in-out;transition:all 0.3s ease-in-out;}
     .C-wrapper button span:before,.C-wrapper button span:after{content:'';position:absolute;bottom:-15px;left:0%;margin-left:-5px;width:0;height:0;border-top:10px solid transparent;border-bottom:10px solid transparent;}
     .C-wrapper button span:after{bottom:15px;margin-left:-14px;border-right:10px solid #52cfeb;z-index:10;}.C-wrapper button:hover span{opacity:1;bottom:4px;left:160px;}
     .robot{text-align:center;color:#52cfeb;}
     .smiles{width:1350px;height:80px;background:url("ЛиствКлетку.gif");text-align:center;margin:0 auto;border:5px solid #52cfeb;border-radius:100px;}.smile{cursor:pointer;margin-top:-20px;}.smilestxt{color:#fff;text-shadow:1px 1px 0 rgb(0,0,0);}.commentstextarea{background:url("ЛиствКлетку.gif");}
     h2{text-align:center;}
     .preloader{position:fixed;left:0;top:0;right:0;bottom:0;background:url("Соцсети/bgF.gif");z-index:9999;}.loaded_hiding{transition:0.1s opacity;opacity:0;}.loaded .preloader{display:none;}.fish{width:218px;height:102px;position:relative;margin:20% auto 0;}.white{color:rgb(255,255,255);}
  </style> 
  </head>
  <body>
       <div class="preloader">
          <div class="fish"><img src="preloader.gif" alt="Отзывы"></div>
          <h2 class="white">Подождите немного, страница загружается.</h2>
       </div>
    <section class="comm">
    <section class="main">
		    <form method='post' action="#">
                <div class="form-1">
				    <p class="field">
						<input type="text" name='name' required placeholder="Как к Вам обращаться?">
						<i class="fa fa-user"></i>
					</p>
					<p class="field">
						<input type='text' name='city' required placeholder="Где Вы живёте?">
						<i class="fa fa-home"></i>
					</p>
					<p class="field">
						<input type='email' name='email' required placeholder="Email (не публикуется)">
						<i class="fa fa-envelope"></i>
					</p>
					<p class="submit1 C-wrapper music4">
                        <button type="submit" name="submit">
                        <i class="fa fa-arrow-right"></i>
						<span>Отправьте отзыв</span>
                        </button>
					</p><br>
					    <div class="comm"><textarea id="text" class="commentstextarea" type='text' name='content' required rows=10 cols=40 placeholder="Oставьте, пожалуйста, свой отзыв."></textarea></div>
                    <p class="robot">Я не Робот</p>
                    <p class="field">
						<input type='text' name='robot' required placeholder="Введите эту фразу: И я тоже">
						<i class="fa fa-feather"></i>
					</p>
                </div>
                <div class="smiles">
                    <span class="smilestxt">Не забудьте щёлкнуть по смайлику, для добавления в свой отзыв.</span><br>
                    <span>
                        <img class="smile" src="Comments/smiles/comando.gif" alt=":(brick:">
			        </span>
			        <span>
			            <img class="smile" src="Comments/smiles/bud.gif" alt=":)cossack:">
			        </span>
			        <span>
			            <img class="smile" src="Comments/smiles/banana.gif" alt=":)banana:">
			        </span>
			            <span>
			        <img class="smile" src="Comments/smiles/computer.gif" alt=":)computer:)">
			            </span>
			        <span>
			            <img class="smile" src="Comments/smiles/connie.gif" alt=":(tic-tac-toe:)">
			        </span>
			        <span>
			            <img class="smile" src="Comments/smiles/dash.gif" alt=":(wall:">
			        </span>
			        <span>
			            <img class="smile" src="Comments/smiles/dog.gif" alt=":)tryst:)">
			        </span>
                    <span>
			            <img class="smile" src="Comments/smiles/escapejar.gif" alt=":(pot:">
			        </span>
			        <span>
			            <img class="smile" src="Comments/smiles/fiona_dog.gif" alt=":)puppy:">
                    </span>
			        <span>
			            <img class="smile" src="Comments/smiles/horse.gif" alt=":(horse:">
			        </span>
			        <span>
			            <img class="smile" src="Comments/smiles/horse2.gif" alt=":)horseback:">
                    </span>
			        <span>
			            <img class="smile" src="Comments/smiles/kuku.gif" alt=":)cuckoo:">
			        </span>
			        <span>
			            <img class="smile" src="Comments/smiles/Laie.gif" alt=":)double-bass:">
                    </span>
			        <span>
			            <img class="smile" src="Comments/smiles/nzd.gif" alt=":(bicycle:)">
			        </span>
			        <span>
			            <img class="smile" src="Comments/smiles/phil.gif" alt=":)broom:">
			        </span>
			        <span>
			            <img class="smile" src="Comments/smiles/rain.gif" alt=":)rain:">
			        </span>
			        <span>
			            <img class="smile" src="Comments/smiles/tnp.gif" alt=":(workman:">
			        </span>
			        <span>
			            <img class="smile" src="Comments/smiles/ven.gif" alt=":)sculptor:">
			        </span>
			        <span>
			            <img class="smile" src="Comments/smiles/xsunx.gif" alt=":(raker:">
			        </span>
			        <span>
			            <img class="smile" src="Comments/smiles/WhiteVoid.gif" alt=":)accordion:">
			        </span>
			        <span>
			            <img class="smile" src="Comments/smiles/drinks.gif" alt=":)drinks:)"> 
			        </span>
			        <span>
			            <img class="smile" src="Comments/smiles/balloon.gif" alt=":(balloon:">
			        </span>
		        </div>
            </form>
    </section>
    <section id="demo">
	    <div class="vertical-align">
	        <!--<div class="">-->
	            <div class="row">
	                <div class="col-sm-6 col-sm-offset-3 col-xs-offset-0">
	                    <div class="no-border">
	                        <div id="chat" class="conv-form-wrapper giraffe music4"><h2 class="bot">Я Бот!</h2>
	                            <form action="" method="post" class="hidden">
	                                <select data-conv-question="Здравствуйте! Я Бот поддержки сайта http://linuxtosha.ru/. Могу Вам составить компанию, хотите поболтаем?" name="first-question">
	                                <option value="sure">Конечно, без проблем!</option>
	                                <input type="text" name="name1" data-conv-question="Хорошо! Как мне к Вам обращаться?">
	                                <input type="text" data-conv-question="Очень приятно, {name1}:0! Моего хозяина зовут Николай!" data-no-answer="true">
	                                <input type="text" data-conv-question="Я попробую больше о Вас узнать, чтобы стать Вам электронным другом." data-no-answer="true">
                                    <select name="multi[]" data-conv-question="{name1}:0! Какие операционные системами Вы в основном используете?" multiple>                                   
	                                    <option value="Linux">Linux</option>
	                                    <option value="Windows">Windows</option>
	                                    <option value="Mac OS">Mac OS</option>
	                                    <option value="Android">Android</option>
                                        <option value="Пивко с воблой">Пивко с воблой</option>
                                    </select>
                                    <select name="programmer1" data-callback="storeState" data-conv-question="Итак, {name1}:0, сколько времени Вы проводите за компьютером?">
	                                    <option value="no">24 часа в сутки.</option>
	                                    <option value="true">Телефон не выпускаю из рук.</option>
	                                    <option value="yes">За кружечкой пенного гораздо дольше, чем за компом.</option>
	                                </select>	                                
	                                <div data-conv-fork="programmer1">
                                        <div data-conv-case="yes">
	                                        <input type="text" data-conv-question='Поздравляю, Вы вступили в клуб любителей пива. Можете выслать мне бутылочку "Жигулёвского".' data-no-answer="true">
	                                    </div>
	                                    <div data-conv-case="yes">
		                                    <select name="thought" data-conv-question='Вы когда нибудь думали перейти на более крепкие напитки?'>
		                                    	<option value="yes">Скорее да, чем нет.</option>
		                                    	<option value="yes">Скорее нет, чем да.</option>
		                                    </select>
		                                    <input type="text" data-conv-question="В любом случае советую воздержаться..." data-no-answer="true">
	                                   </div>
                                        <div data-conv-case="true">
	                                        <input type="text" data-conv-question='Снимаю шляпу! Я вообше не умею им пользоваться.' data-no-answer="true">
	                                    </div>
	                                    <div data-conv-case="true">
		                                    <select name="thought" data-conv-question='Не хотите ли оставить свой номер? В случае чего, я Вам перезвоню.'>
		                                    	<option value="true">Хочу, но не могу.</option>
		                                    	<option value="true">Могу, но не хочу.</option>
		                                    </select>
		                                    <input type="text" data-conv-question="Как будет угодно!" data-no-answer="true">
                                        </div>
	                                    <div data-conv-case="no">
	                                        <input type="text" data-conv-question="Поздравляю, Вы вступили в клуб по интересам, хозяин тоже проводит очень много времени за компом..." data-no-answer="true">
	                                    </div>
	                                    <div data-conv-case="no">
		                                    <select name="thought" data-conv-question='Когда нибудь Вам приходилось оторваться от компа и увидеть "Лунный свет" в окне?'>
		                                    	<option value="no">Нет, да наверное.</option>
		                                    	<option value="no">Да, нет наверное.</option>
		                                    </select>
		                                    <input type="text" data-conv-question="Ответ впечатляет." data-no-answer="true">
	                                    </div>
	                                </div>
	                                <input data-conv-question="{name1}:0! Пожалуйста, сообщите мне свой «email», чтобы хозяин мог с Вами связаться." data-pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" id="email" type="email" name="email1" required placeholder="What's your e-mail?">
	                                <input data-conv-question="А теперь всё, что хотите сообщить хозяину." type="text" name="content1">
	                                <select data-conv-question="Спасибо, я постараюсь передать... Надеюсь, мы остались друзьями?">
	                                    <option value="Думаю, что да!">Думаю, что да!</option>
	                                </select>
	                                <input type="text" data-conv-question="Удачи {name1}:0! До связи." data-no-answer="true">
	                                <select data-conv-question="Если не возражаете, Ваше сообщение отправлю хозяину.">
	                                    <option value="Не возражаю.">Не возражаю.</option>
	                                </select>
	                            </form>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        <!--</div>-->
	    </div>
	</section></section>
	<script type="text/javascript" src="jquery-1.7.2.min.js"></script>
	                                <!--Smiles-->
    <script type="text/javascript">
		$(document).ready(function(){
			$(".smile").click(function(){
				var smile = $(this).attr('alt');
				var text = $.trim($("#text").val());
				$("#text").focus().val(text + ' ' + smile + ' ');
			});
		});
    </script>
    <script type="text/javascript" src="Comments/autosize.js"></script>
	<script type="text/javascript" src="Comments/bot.js"></script>
	<script>
		var rollbackTo = false;
		var originalState = false;
		function storeState(stateWrapper) {
			rollbackTo = stateWrapper.current;
			console.log("storeState called: ",rollbackTo);
		}
		function rollback(stateWrapper) {
			console.log("rollback called: ", rollbackTo, originalState);
			console.log("answers at the time of user input: ", stateWrapper.answers);
			if(rollbackTo!=false) {
				if(originalState==false) {
					originalState = stateWrapper.current.next;
						console.log('stored original state');
				}
				stateWrapper.current.next = rollbackTo;
				console.log('changed current.next to rollbackTo');
			}
		}
		function restore(stateWrapper) {
			if(originalState != false) {
				stateWrapper.current.next = originalState;
				console.log('changed current.next to originalState');
			}
		}
	</script>
	<script>
		jQuery(function($){
			var convForm = $('#chat').convform();
			console.log(convForm);
		});
	</script>
                 <audio id="sound-link3" preload="auto">
                    <source src="bells/switch.mp3" type="audio/mpeg">
                    <source src="bells/switch.ogg" type="audio/ogg">
                 </audio>
                 <script>
                    var soundLink4 = $("#sound-link3")[0];
                    $(".music4").mousedown(function() {
                    soundLink4.play();
                    });
                 </script>
                            <!--Google Analytics-->
   <script> 
       (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
       (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
       m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
       })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
       ga('create', 'UA-74368123-1', 'auto');
       ga('send', 'pageview');
   </script>
                       <!--Yandex.Metrika-->
    <script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(70910983, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true
   });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/70910983" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
                      <!--Rating Mail.ru-->
   <script type="text/javascript">
var _tmr = window._tmr || (window._tmr = []);
_tmr.push({id: "3203799", type: "pageView", start: (new Date()).getTime()});
(function (d, w, id) {
  if (d.getElementById(id)) return;
  var ts = d.createElement("script"); ts.type = "text/javascript"; ts.async = true; ts.id = id;
  ts.src = "https://top-fwz1.mail.ru/js/code.js";
  var f = function () {var s = d.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ts, s);};
  if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); }
})(document, window, "topmailru-code");
   </script><noscript><div>
              <img src="https://top-fwz1.mail.ru/counter?id=3203799;js=na" style="border:0;position:absolute;left:-9999px;" alt="Top.Mail.Ru" />
   </div></noscript>
                            <!--Preloader-->
        <script>
              window.onload = function () {
              document.body.classList.add('loaded_hiding');
              window.setTimeout(function () {
              document.body.classList.add('loaded');
              document.body.classList.remove('loaded_hiding');
              }, 500);
              }
        </script>
  </body>
</html>

 




