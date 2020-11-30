(function($){
	$.fn.customFile = function(){
		this.each(function(){
			var that = $(this);
			that.addClass("customFile");
			var wraper = $("<span class='fileWraper'><input type='text' class='input-small'/><button class='button'>浏览</button></span>");
			that.after(wraper);
			wraper.prepend(that);
			wraper.on("change",function(){
				$("[type=text]",this).val($("[type=file]",this).val());
			});

		});
		return this;
	}

	$(function(){
		if(!$.browser.msie){
			$("input[type=file]").customFile();
		}
	});
})(jQuery);