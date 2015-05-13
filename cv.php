<?php			
	date_default_timezone_set('Europe/Kiev');

	if (!empty($_POST['user_lang'])){
		switch ($_POST['user_lang']) {
			case ('ru'):
				send_resume_ru();
				break;
			case ('en'):
				send_resume_en();
				break;
			default: // действие по умолчанию
		}
	}
	function send_resume_ru(){
		$main = "
			<div class= 'resume'>
				<h2>Резюме</h2>
				<h4>Навыки и технологии</h4>
				<ul>
					<li><span class = 'termin'>Html5, CSS3</span>
					<li><span class = 'termin'>Javascript, jQuery, Ajax</span>
					<li>базовые навыки <span class = 'termin'>PHP, MySQL, Kohana</span>
					<li><span class = 'termin'>Photoshop</span>(работа с макетами, скрипты на JS), <span class = 'termin'>Fireworks</span>
					<li><span class = 'termin'>Git</span>
					<li>Опыт кроссбраузерной и адаптивной верстки
					<li>Опыт работы с библиотеками, модулями (<span class = 'termin'>jQuery UI, PHPExcel, AmCharts, Google Charts</span>)
					<li>Английский – intermediate (свободно читаю технический текст, разговор и переписка – простыми фразами)
				</ul>
				<h4>Образование</h4>
				<p>НТУУ 'КПИ', Приборостроительный факультет, лазерная и опто-електронная техника, специалист, 2002 - 2008 г.</p>
				<h4>Опыт работы</h4>
				<p>freelance web developer - 1 год.</p>
				<p>2008 - 2015 инженер, научный сотрудник, начальник лаборатории в Украинском центре метрологии.</p>
				<h4>Черты характера</h4>
				<p>Организованный, способен решать сложные задачи, быстро обучаться, без вредных привычек, хобби - программирование.</p>
			</div>
			<a href='Kovalenko_A_2015.pdf'>Резюме в формате PDF</a> <br>
			<a href='Kovalenko_A_2015.doc'>Резюме в формате DOC</a>
		";	
			
		echo json_encode(array('main' => $main));
		
		
	}	
	function send_resume_en(){
		$main =  "
			<div class= 'resume'>
				<h2>Resume</h2>
				<h4>Skills and technology</h4>
				<ul>
					<li><span class = 'termin'>Html5, CSS3</span>
					<li><span class = 'termin'>Javascript, jQuery, Ajax</span>
					<li> basic skills: <span class = 'termin'>PHP, MySQL, Kohana</span>
					<li><span class = 'termin'>Photoshop</span>(working with layouts, scripts JS), <span class = 'termin'>Fireworks</span>
					<li><span class = 'termin'>Git</span>
					<li>Experience in cross-browser and adaptive layout
					<li>Experience with libraries, modules: (<span class = 'termin'>jQuery UI, PHPExcel, AmCharts, Google Charts</span>)
					English - intermediate level (reading freely technical text, conversation and correspondence - by simple phrases)
				</ul>
				<h4>Education</h4>
				<p>NTUU 'KPI' Instrumentmaking department, Laser and opto-electronical engineering, master's degree, 2002 - 2008.</p>
				<h4>Experience</h4>
				<p>freelance web developer - 1 year.</p>
				<p>2008 - 2015 engineer, researcher, head of laboratory at the Ukrainian center of metrology.</p>
				<h4>Features of character</h4>
				<p>Self-organized, able to solve complex tasks and learn quickly, don't have bad habits, hobbie - programming.</p>
			</div>
			<a href='Kovalenko_A_2015.pdf'>Resume in PDF format</a> <br>
			<a href='Kovalenko_A_2015.doc'>Resume in DOC format</a>
		";
		echo json_encode(array('main' => $main));
	}	
		
?>