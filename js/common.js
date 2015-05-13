$(document).ready(function() {
	navbarSetup();
	sliderSetup();
	tooltipSetup();
	langSetup();
});

function navbarSetup(){
	var scrollStart = 50;
	$(window).scroll(function() {
		var scroll = $(window).scrollTop();
		if (scroll > scrollStart){ //$('.navbar').hasClass('navbar-transparent')
			$('.nav_portreit').show();
			$('.navbar').addClass('navbar-inverse navbar-fixed-top').removeClass('navbar-default navbar-transparent');
		}else {
			$('.navbar').removeClass('navbar-inverse navbar-fixed-top').addClass('navbar-default navbar-transparent');
			$('.nav_portreit').hide();
		}
	});
}
function sliderSetup(){
	$('header').vegas({
		slides: [
			{ src: 'images/bg_1.jpg' },
			{ src: 'images/bg_2.jpg' }
		],
		transition: 'fade', //[ 'fade', 'zoomOut', 'swirlLeft' ]
		timer: false
	});
}
function tooltipSetup(){
	$('[data-toggle="tooltip"]').tooltip();
}
function langSetup(){
	var lang = $.cookie('lang');
	var page = $.cookie('file_name');
	var tab_index = parseInt($.cookie('tab_index'));
	if(! lang){
		var lang = 'ru';
		$.cookie('lang', 'ru');
	}
	if(! page){
		var page = 'portfolio.php';
		$.cookie('page', 'portfolio.php');
	}
	if(! (tab_index >= 0)){
		var tab_index = 0;
		$.cookie('tab_index', '0');
	}

	load_common_parts(lang, tab_index);
	load_page(lang, page, tab_index);
	switch (lang){
		case "ru": set_lang_btn('.lang_selector li:nth-child(1)')
			break
		case "en": set_lang_btn('.lang_selector li:nth-child(2)')
			break
	}

	$('.lang_selector li:nth-child(1)').click(function(){
		change_lang(this, 'ru');
	});
	$('.lang_selector li:nth-child(2)').click(function(){
		change_lang(this, 'en');
	});
	function change_lang(btn, lang){
		$.cookie('lang', lang);
		set_lang_btn(btn)
		load_common_parts(lang, $.cookie('tab_index'));
		load_page(lang, $.cookie('file_name'), $.cookie('tab_index'));
	}
	function set_lang_btn(btn){
		$(btn).siblings('li').css({"background" : "gray"});
		$(btn).css({"background" : "#FF9900"});
	}

	var file_names = [
		"common_page.php",
		"cv.php",
		"portfolio.php",
		"contacts.php",
	];

	$("body").on("click", '.navbar-nav li', function(e){
		if (e.target.tagName == "LI"){
			var index = $(e.target).index();
		}else{
			var index = $(e.target).parent().index();
		}
		alert(index)


		load_common_parts($.cookie('lang'), index);
		load_page($.cookie('lang'), file_names[index], index);
	});
};

function toggle_tabs(index){
	$(".sidebar_menu li").each(function(){
		this.style.cssText = "";
	});
	$(".navigation li").each(function(){
		this.style.cssText = "";
	});
	$(".sidebar_menu li:nth-child("+(index+1)+") ").css({ "margin-left": "5px",	"margin-right": "0"});
	$(".navigation li:nth-child("+(index+1)+") ").css({ "margin-bottom": "-10px",	"height": "35px"});
	$.cookie('tab_index', index);
}

function load_page(language, file_name, index){
	document.body.style.cursor = "wait";
	$.post( file_name, {user_lang: language})
		.success( function( data ){
			var data = JSON.parse(data);
			$(".content").html(data.main);
			$.cookie('file_name', file_name);
			document.body.style.cursor = "default";
		});

}
function load_common_parts(language, index){
	document.body.style.cursor = "wait";
	$.post( "common_page.php", {user_lang: language})
		.success( function( data ){
			var data = JSON.parse(data);
			var style_li = [];
			$(".navigation li").each(function(){
				style_li.push(this.style.cssText);
			});

			$(".header").html(data.header);

			$(".navigation li").each(function(){
				this.style.cssText = style_li.shift();
			});


			var style_li = [];
			$(".sidebar_menu li").each(function(){
				style_li.push(this.style.cssText);
			});
			$(".sidebar_menu").html(data.sidebar_menu);
			$(".sidebar_menu li").each(function(){
				this.style.cssText = style_li.shift();
			});
			toggle_tabs(index);
			document.body.style.cursor = "default";
		});
}





/*
	$("body").on("click", '.navbar-nav li', function(e){
		if (e.target.tagName == "LI"){
			var index = $(e.target).index();
		}else{
			var index = $(e.target).parent().index();
		}


		var slides = [
			{ src: 'images/bg_portfolio_1.jpg' },
			{ src: 'images/bg_portfolio_2.jpg' },
			{ src: 'images/bg_portfolio_3.jpg' }
		];
		$('.vegas-container').vegas('options', 'slides', slides);

	})

*/







	/*
        //Таймер обратного отсчета
        //Документация: http://keith-wood.name/countdown.html
        //<div class="countdown" date-time="2015-01-07"></div>
        var austDay = new Date($(".countdown").attr("date-time"));
        $(".countdown").countdown({until: austDay, format: 'yowdHMS'});


        //Попап менеджер FancyBox
        //Документация: http://fancybox.net/howto
        //<a class="fancybox"><img src="image.jpg" /></a>
        //<a class="fancybox" data-fancybox-group="group"><img src="image.jpg" /></a>
        $(".fancybox").fancybox();

        //Навигация по Landing Page
        //$(".top_mnu") - это верхняя панель со ссылками.
        //Ссылки вида <a href="#contacts">Контакты</a>
        $(".top_mnu").navigation();

        //Добавляет классы дочерним блокам .block для анимации
        //Документация: http://imakewebthings.com/jquery-waypoints/
        $(".block").waypoint(function(direction) {
            if (direction === "down") {
                $(".class").addClass("active");
            } else if (direction === "up") {
                $(".class").removeClass("deactive");
            };
        }, {offset: 100});

        //Плавный скролл до блока .div по клику на .scroll
        //Документация: https://github.com/flesler/jquery.scrollTo
        $("a.scroll").click(function() {
            $.scrollTo($(".div"), 800, {
                offset: -90
            });
        });

        //Каруселька
        //Документация: http://owlgraphic.com/owlcarousel/
        var owl = $(".carousel");
        owl.owlCarousel({
            items : 4
        });
        owl.on("mousewheel", ".owl-wrapper", function (e) {
            if (e.deltaY > 0) {
                owl.trigger("owl.prev");
            } else {
                owl.trigger("owl.next");
            }
            e.preventDefault();
        });
        $(".next_button").click(function(){
            owl.trigger("owl.next");
        });
        $(".prev_button").click(function(){
            owl.trigger("owl.prev");
        });
    */
	//Кнопка "Наверх"
	//Документация:
	//http://api.jquery.com/scrolltop/
	//http://api.jquery.com/animate/
	$("#top").click(function () {
		$("body, html").animate({
			scrollTop: 0
		}, 800);
		return false;
	});
	
	//Аякс отправка форм
	//Документация: http://api.jquery.com/jquery.ajax/
	$("form").submit(function() {
		$.ajax({
			type: "GET",
			url: "mail.php",
			data: $("form").serialize()
		}).done(function() {
			alert("Спасибо за заявку!");
			setTimeout(function() {
				$.fancybox.close();
			}, 1000);
		});
		return false;
	});

