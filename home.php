<?php			
	date_default_timezone_set('Europe/Kiev');

	if (!empty($_POST['user_lang'])){
		switch ($_POST['user_lang']) {
			case ('ru'):
				send_home_ru();
				break;
			case ('en'):
				send_home_en();
				break;
			default: // действие по умолчанию
		}
	}
	function send_home_ru(){
		$main = '
			<div class="container">
			<div class="row">

					<div class="shortcut col-lg-6 col-md-6 col-sm-6">
						<a href="http://sphere.3d-foto.in.ua" target="_blank">
							<div class="shortcut-text">
								Ход лучей в интегрирующей сфере
							</div>
						</a>
					</div>
					<div class="shortcut col-lg-6 col-md-6 col-sm-6">
						<a href="http://koh.3d-foto.in.ua" target="_blank">
							<div class="shortcut-text">
								База данных спецодежды
							</div>
						</a>
					</div>
					<div class="shortcut col-lg-6 col-md-6 col-sm-6">
						<a href="http://cv.3d-foto.in.ua/projects/web-page-bonfire/bonfire.html" target="_blank">
							<div class="shortcut-text">
								Web страница со слайдерами
							</div>
						</a>
					</div>
					<div class="shortcut col-lg-6 col-md-6 col-sm-6">
						<a href="http://cv.3d-foto.in.ua/projects/helth/index.html" target="_blank">
							<div class="shortcut-text">
								Адаптивная страница на чистом CSS
							</div>
						</a>
					</div>


			</div>
		</div>
		';
			
		echo json_encode(array('main' => $main));
		
		
	}	
	function send_home_en(){
		$main =  '
			<div class="container">
			<div class="row">

					<div class="shortcut col-lg-6 col-md-6 col-sm-6">
						<a href="http://sphere.3d-foto.in.ua" target="_blank">
							<div class="shortcut-text">
								Ray tracing in integrating sphere
							</div>
						</a>
					</div>
					<div class="shortcut col-lg-6 col-md-6 col-sm-6">
						<a href="http://koh.3d-foto.in.ua" target="_blank">
							<div class="shortcut-text">
								Work wear database
							</div>
						</a>
					</div>
					<div class="shortcut col-lg-6 col-md-6 col-sm-6">
						<a href="http://cv.3d-foto.in.ua/projects/web-page-bonfire/bonfire.html" target="_blank">
							<div class="shortcut-text">
								Web page with sliders
							</div>
						</a>
					</div>
					<div class="shortcut col-lg-6 col-md-6 col-sm-6">
						<a href="http://cv.3d-foto.in.ua/projects/helth/index.html" target="_blank">
							<div class="shortcut-text">
								Responsive page on clear CSS
							</div>
						</a>
					</div>


			</div>
		</div>
		';
		echo json_encode(array('main' => $main));
	}	
		
?>