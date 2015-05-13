<?php			
	date_default_timezone_set('Europe/Kiev');

	if (!empty($_POST['user_lang'])){
		switch ($_POST['user_lang']) {
			case ('ru'):
				send_contacts_ru();
				break;
			case ('en'):
				send_contacts_en();
				break;
			default: // действие по умолчанию
		}
	}
	function send_contacts_ru(){
		$main = "
			<div class= 'contacts'>
				<h2>Контактная информация</h2>
				<ul>
					<li>a.kovalenko@ukr.net
					<li>тел. 097 717 15 47
					<li>г. Киев, ул. Регенераторная, 4.
					<li><a href='skype:kovalenko.84' title='kovalenko.84'>skype:kovalenko.84</a>
				</ul>
				
			</div>
		";
			
		echo json_encode(array('main' => $main));
		
		
	}	
	function send_contacts_en(){
		$main =  "
			<div class= 'contacts'>
				<h2>Contact information</h2>
				<ul>
					<li>a.kovalenko@ukr.net
					<li>tel. 097 717 15 47
					<li>Str. Regeneratorna, 4, Kyiv, Ukraine.
					<li>skype: kovalenko.84
				</ul>
				
			</div>
		";
		echo json_encode(array('main' => $main));
	}	
		
?>