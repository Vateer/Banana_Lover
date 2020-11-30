(function($) {
	$(function() {
		var root = $("body");
		//当有change事件发生时，通知观察者触发dataChange事件。
		root.on("change.observer submit.observer", "[data-observer]", function(e) {
			var that = $(this);
			if(that.is("form") && e.type=="change"){
				return true;
			}
			if (e.type == "submit") {
				e.preventDefault();
			}
			var observer = $(that.data("observer"));
			var param = that.serializeArray();
			if (!param.length) {
				param = that.find(":input").serializeArray();
			}
			observer.trigger("dataChange", [param]);
		});

		//为所有有data-source属性的元素在dataChange时发起ajax请求
		root.on("dataChange.observer", "[data-source]", function(e, data) {
			var that = $(this);
			$.post(that.data("source"), data, null, "json").done(function(data) {
				that.trigger("dataRender", data);
			});
		});

		//为所有data-template-name属性的元素绑定模板渲染事件
		root.on("dataRender.observer", "[data-template-name]", function(e, data) {
			var that = $(this);
			if (!data) {
				return false;
			}
			var tpl = $("script[name=" + that.data("template-name") + "]").html();
			if (tpl) {
				that.html(juicer(tpl, data));
				setTimeout(function(){that.trigger("change");},0);
			}
		});
	});
})(jQuery);