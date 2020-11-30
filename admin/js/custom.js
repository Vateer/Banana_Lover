$(document).ready(function() {
	kriesi_tab('#content', '.jquery_tab_title', '.jquery_tab'); /*remove this if you dont want to have jquery tabs*/
	kriesi_navigation(".nav"); /*remove this if you dont want a jquery sidebar menu*/
	kriesi_closeable_divs(".closeable"); /*remove this if you dont want message box to be closeable*/
	$(".flexy_datepicker, .flexy_datepicker_input").datepicker(); //datepicker input field and box
	$("#dialog").dialog(); //pop up dialog window on pageopen.
	// 初始化uEditor
	if (window.UEDITOR_CONFIG) {
		window.UEDITOR_CONFIG.UEDITOR_HOME_URL = "/ueditor1_2_2_0-utf8-php/";
		$(".uEditor").each(function() {
			var editor = new baidu.editor.ui.Editor();
			editor.render(this);
		});
	}

	$("table.datalist").each(function() {
		$("tbody tr:odd", this).addClass("odd");
		$("tbody tr:even", this).addClass("even");
	});

	choosetab();

	$("body").on("click","a:contains('删除')",function(){
		return confirm("确定删除吗？");
	});
});



function kriesi_closeable_divs(element) {
	$(element).each(function() {
		$(this).append('<div class="click_to_close"></div>')
	});

	$(".click_to_close").click(function() {
		$(this).parent().slideUp(200);
	});
}



function kriesi_navigation(element) {
	$(element).each(function() {
		var currentlistitem;
		currentlistitem = $(this).find(">li");
		currentlistitem.each(function() {
			var links = $("a[href]",this);
			for(var i=0;i<links.length;i++){
				if((new RegExp(links[i].href+"$")).test(location.href)){
					$(links[i]).parent().addClass("current");
					return true;
				}
			}
			$(this).find('ul').addClass("closed").css({display: "none"});
		});

		currentlistitem.find('a:eq(0)').each(function() {
			$(this).click(function() {
				if ($(this).next('ul').hasClass('closed')) {
					$(this).next('ul').slideDown(200).removeClass("closed");
					return false;
				} else {
					$(this).next('ul').slideUp(200).addClass("closed");
					return false;
				}
			});
		});
	});
}



function kriesi_tab(wrapper, header, content) {
	var title = wrapper + " " + header;
	var container_to_hide = wrapper + " " + content;
	var duration = 200;

	if ($.browser.msie) {
		duration = 10;
	}
	disable = false;


	$(title).each(

	function(i) {
		var clone = $(this).clone();
		clone.find(">*").remove();
		if (i == 0) {
			$(wrapper).prepend("<div class='jquery_tab_container'><a href='/' class='heading_tab advanced_link active tab" + (i + 1) + "'>" + clone.html() + "</a></div>");
		} else {
			$(".advanced_link:last").after("<a href='/'class='heading_tab advanced_link tab" + (i + 1) + "'>" + clone.html() + "</a>");
		}
	});

	$(container_to_hide).each(

	function(i) {
		$(this).addClass("tablist list_" + i);
		if (i != 0) {
			$(this).css({
				display: "none"
			});
		}
	});

	$(".advanced_link").each(

	function(i) {
		$(this).bind("click", function() {
			if ($(this).hasClass('active')) {
				return false
			}
			if (disable == false) {
				disable = true;
				$(".advanced_link").removeClass("active");
				$(this).addClass("active");

				$(container_to_hide + ":visible").fadeOut(duration, function() {

					$(".list_" + i).fadeIn(duration, function() {
						disable = false;
					});
				});
			}
			return false;

		});
	});
}

function choosetab() {
	var hash = window.location.hash;
	if (hash.match(/^#tab(\d)$/)) {
		var tab = hash.replace(/^#tab/, "");
		var select_tab = tab - 1;
		$(".jquery_tab").css({
			display: "none"
		}).filter(":eq(" + select_tab + ")").css({
			display: "block"
		});
		$(".jquery_tab_container .active").removeClass('active');
		$(".heading_tab").filter(":eq(" + select_tab + ")").addClass('active');

	}
}