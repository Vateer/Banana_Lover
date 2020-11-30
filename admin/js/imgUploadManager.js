(function($){
	$.fn.imgUploadManager = function(){
		this.each(function(){
			var that = $(this);
			var file = that.find(">:file,.customFile");
			var ul = that.find(">ul");
			var tmp = "<li><img/><input type='checkbox'/><a>删除</a></li>";
			if(!file.length){
				file = $("<input type='file' name='files' />");
				that.prepend(file);
				file.customFile();
			}

			if(!ul.length){
				ul = $("<ul/>");
				that.append(ul);
			}

			that.on("change",".checkAll",$.proxy(function(e){
				var tango = $(e.target);
				$(":checkbox",this).attr("checked",!!tango.attr("checked"));
			},this));

			that.on("click",".delAll",$.proxy(function(e){
				$("li",this).has(":checked").find("a").click();
				return false;
			},this));

			that.on("change",":file",$.proxy(function(e){
				var that = $(this);
				var tango = $(e.target).select().blur();
				if(document.selection){
					var imgSrc = document.selection.createRange().text;
				}
				var preview = $(tmp);
				var img = preview.find("img");
				var FileReader = window.FileReader;

				tango.after(tango.clone(true).val(""));
				preview.append(tango.hide());
				ul.prepend(preview);

				if(FileReader){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        img.attr("src",e.target.result);
                    }
                    reader.readAsDataURL(e.target.files[0]);
                }
                else{
                    img.replaceWith("<span class='img'><span></span></span>");
                    preview.find(".img span")[0].filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = imgSrc; 
                }


			},this));

			that.on("click","li",function(e){
				if($(e.target).is("a")){
					var that = $(this);
					$(this).animate({"margin":-that.innerWidth()/2,"opacity":0},"fast",function(){$(this).remove()});
				}
			});
		});
		return this;
	}

	$(function(){
		$(".imgUploadManager").imgUploadManager();
	});
})(jQuery);