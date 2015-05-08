function Cyclic_slider(wrapper){
	this.wrapper = wrapper;
	this.slide_1 = $(this.wrapper).children(':first-child');
	this.next_link = $(this.wrapper).prev();
	this.prev_link = $(this.wrapper).next();
	
	var init_margin_px = this.slide_1.css("marginRight");  
	init_margin_px = parseFloat(init_margin_px);
	var wrapper_width_px = this.wrapper.width();
	var init_margin = 100 * (init_margin_px / wrapper_width_px) +'%';
	
	var scroll_width_px = this.slide_1.outerWidth();
	var scroll_width = 100 * ((scroll_width_px + init_margin_px) / wrapper_width_px) +'%';
	
	this.init_margin = init_margin;
	this.scroll_width = scroll_width;
	this.animation_time = 400;
	
	this.next_link[0].addEventListener('click',function(){
		this.next();
	}.bind(this), false);
	this.prev_link[0].addEventListener('click',function(){
		this.previous();
	}.bind(this), false);
	
	window.addEventListener('resize', function(){
		this.resize();
	}.bind(this));

}

Cyclic_slider.prototype.resize = function(){
	var init_margin_px = this.slide_1.css("marginRight");  
	init_margin_px = parseFloat(init_margin_px);
	var wrapper_width_px = this.wrapper.width();
	var init_margin = 100 * (init_margin_px / wrapper_width_px) +'%';
	
	var scroll_width_px = this.slide_1.outerWidth();
	var scroll_width = 100 * ((scroll_width_px + init_margin_px) / wrapper_width_px) +'%';
	
	this.init_margin = init_margin;
	this.scroll_width = scroll_width;
}	

Cyclic_slider.prototype.next = function(){
	if( ! this.slide_1.is(':animated')) {
		var last_slide = $(this.wrapper).children(':last-child');
		last_slide.css({margin: '0 '+ this.init_margin +' 0 -' + this.scroll_width});
		last_slide.insertBefore(this.slide_1);
		this.slide_1 = $(this.wrapper).children(':first-child');
		this.slide_1.animate({margin: '0 '+ this.init_margin +'% 0 0'}, this.animation_time);
	}
}

Cyclic_slider.prototype.previous = function(){
	if( ! this.slide_1.is(':animated')) {
		$(this.wrapper).children(':last-child').css({display: 'list-item'});
		this.slide_1.animate({margin: '0 '+ this.init_margin +' 0 -'+ this.scroll_width}, this.animation_time, function(){
			$(this.slide_1).remove()
			.css({margin: '0 '+ this.init_margin +' 0 0'})
			.insertAfter($(this.wrapper).children(':last-child'));
			this.slide_1 = $(this.wrapper).children(':first-child');
		}.bind(this));
	}
}

Cyclic_slider.prototype.previous = function(){
	if( ! this.slide_1.is(':animated')) {
		$(this.wrapper).children(':last-child').show(); //css({display: 'inline-flex'});
		this.slide_1.animate({margin: '0 '+ this.init_margin +' 0 -'+ this.scroll_width}, this.animation_time, function(){
			$(this.slide_1).remove()
			.css({margin: '0 '+ this.init_margin +' 0 0'})
			.insertAfter($(this.wrapper).children(':last-child'));
			this.slide_1 = $(this.wrapper).children(':first-child');
		}.bind(this));
	}
}
	




