(function($){
	window.alert = function(msg){
		var tango = $(msg);
		if(!tango.length){
			tango = $("<div/>").append(msg);
		}
		if(!tango.attr("title")){
			tango.attr("title","注意");
		}
		tango.dialog({modal:true});
	};
})(jQuery);