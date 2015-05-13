<?php			
	date_default_timezone_set('Europe/Kiev');

	if (!empty($_POST['user_lang'])){
		switch ($_POST['user_lang']) {
			case ('ru'):
				send_page_ru();
				break;
			case ('en'):
				send_page_en();
				break;
			default: // действие по умолчанию
		}
	}
	function send_page_ru(){
		$header = "
			<div class='portrait'>
				<img src='images/foto.jpg' alt='foto'>
				<div>
					<h1>Коваленко<br> 
						Анатолий
					</h1>
					<h3>Фронт-енд разработчик</h3>
				</div>
			</div>
			<ul class='navigation'>
				<li><span>Портфолио</span>
				<li><span>Резюме</span>
				<li><span>Контакты</span>
			</ul>
		";
		
		$footer = '
			<div class="container">
				<div class="row">
					<a class="footer-logo col-sm-4 col-md-3 col-lg-2" href="#">Front-end developer</a>
					<p class="footer-tag col-sm-8 col-md-9 col-lg-10">
						Built on Bootstrap 3 - Hosted by <a href="http://www.ukraine.com.ua" target="_blank">ukraine.com.ua</a> - Brought to life by <a href="http://cv.3d-foto.in.ua" target="_blank">Me</a>
						 - Last update 11.05.2015
					</p>
				</div>
			</div>
		';
		
		echo json_encode(array("header" => $header, "footer" => $footer));
		
		
	}	
	function send_page_en(){
		$header = '
			<div class="row">
					<div class="header-avatar col-lg-2 col-sm-3 col-xs-12">
						<img class="img-circle img-thumbnail" src='images/p3.jpg' alt='portreit'>
					</div>
					<div class="header-description col-lg-6 col-sm-6 col-xs-12">
						<p>
							Привет всем! Меня зовут Анатолий, я javaScript/Front-end разработчик, и сейчас ищу постоянное место работы. Я хорошо владею: HMTL5, CSS3, Javascript/jQuery и Ajax.
							Также, работал с PHP, MySQL и фреймворком Kohana.
						</p>
					</div>
					<div class="header-links col-lg-3 col-sm-3 col-xs-12">
						<ul class="header-social-links">
							<li>
								<a class="btn btn-primary pjh-icon pjh-icon-linkedin" href="https://www.linkedin.com/in/kovalenkoanatoliy" target="_blank" data-toggle="tooltip" data-placement="bottom" title="linkedin.com/in/kovalenkoanatoliy">
									<i class="fa fa-linkedin"></i>
								</a>
							</li>
							<li>
								<a class="btn btn-primary pjh-icon pjh-icon-phone" href="mailto:a.kovalenko@ukr.net" data-toggle="tooltip" data-placement="bottom" title="a.kovalenko@ukr.net">
									<i class="fa fa-envelope-o"></i>
								</a>
							</li>
							<li>
								<a class="btn btn-primary pjh-icon pjh-icon-mail" href="skype:kovalenko.84" data-toggle="tooltip" data-placement="bottom" title="kovalenko.84">
									<i class="fa fa-skype"></i>
								</a>
							</li>
							<li>
								<a class="btn btn-primary pjh-icon pjh-icon-twitter" href="https://github.com/git-kovalenko" title="git-kovalenko" target="_blank" data-toggle="tooltip" data-placement="bottom">
									<i class="fa fa-github-alt"></i>
								</a>
							</li>
						</ul>

					</div>

				</div>
		';
		
		$footer = '
			<div class="container">
				<div class="row">
					<a class="footer-logo col-sm-4 col-md-3 col-lg-2" href="#">Front-end developer</a>
					<p class="footer-tag col-sm-8 col-md-9 col-lg-10">
						Разработано на Bootstrap 3 - Хостинг <a href="http://www.ukraine.com.ua" target="_blank">ukraine.com.ua</a> - Создатель <a href="http://cv.3d-foto.in.ua" target="_blank">я</a>
						 - Последнее обновление 13.05.2015
					</p>
				</div>
			</div>
		';
		
		echo json_encode(array("header" => $header, "footer" => $footer));
	}	
		
?>