(function($) {

	var methods = {
		ajaxRequest: function(e) {
			var that = $(this);
			if(that.is(":contains('删除')") && !confirm("确定删除吗？")){
				return false;
			}
			var postArgu = getArgu = "";
			if (e.type == "submit") {
				postArgu = that.serializeArray();
			} else {
				getArgu = $(e.target).attr("href").replace(location.protocol+"//"+location.host,"");
			}
			$[that.attr("method") || "get"](that.attr("action") + getArgu, postArgu, $.proxy(this, "render"), "json").fail($.proxy(this,"ajaxFail"));
			return false;
		},
		render: function(data) {
			if (data.error){
				alert(data.error);
			}
			else{
				$(this).html(this.tpl.render(data));
				$("tbody tr:odd", this).addClass("odd");
				$("tbody tr:even", this).addClass("even");
			}
		},
		ajaxFail:function(){
			$.error("ajaxJSONFail");
		}
	}

	$.fn.dataGrid = function() {
		this.each(function() {
			var that = $(this);
			var tpl = that.find("script[type$=juicer-tpl]").remove().html();
			var data = $.parseJSON(that.find("script[type$=json]").remove().html());
			$.extend(this, methods);
			this.tpl = juicer(tpl);
			that.on("submit", this.ajaxRequest);
			that.on("click", "a[href]:not([target])", $.proxy(this, "ajaxRequest"));
			if(data){
				this.render(data);
			}
		});
		return this;
	};

	$(function() {
		$(".dataGrid").dataGrid();
	});
})(jQuery);