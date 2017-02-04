$("#sb-add").click(function(){
    window.location.href=SCOPE.add_url;
});

$(".sb-table #sb-edit").click(function(){

	var id = $(this).attr('attr-id');
	var catid = $(this).attr('cat-id');

	if(catid != null){
		window.location.href=SCOPE.edit_url+"&id="+id+"&catid="+catid;
	}else{
		window.location.href=SCOPE.edit_url+"&id="+id;
	}
});


$(".sb-table #sb-edit-top").click(function(){
	postData = {};
	postData['news_id'] = $(this).attr('attr-id');
	postData['newsname'] = $(this).attr('attr-name');
	postData['catid'] = $(this).attr('attr-catid');
	postData['id'] = $(this).attr('attr-top-id');

	var url = SCOPE.edit_url;
	layer.open({
		type : 0,
		title : "是否提交",
		btn : ['yes','no'],
		icon : 3,
		closeBtin : 2,
		content : "是否置顶",
		scrollbar : true,
		yes : function(){
			$.post(url,postData,function(result){
				if(result.status == 0){
					return dialog.error(result.message);
				}
				if(result.status == 1){
					return dialog.success(result.message,SCOPE.jump_url);
				}
			},"JSON");
		},
	});
	
});

$('.sb-table #sb-delete').on('click',function(){
	var id = $(this).attr('attr-id');
	postId = {};
	postId['id'] = id;
	var message = $(this).attr('attr-message');
	var url = "./admin.php?a=delete";
	layer.open({
		type : 0,
		title : "是否提交",
		btn : ['yes','no'],
		icon : 3,
		closeBtin : 2,
		content : "是否"+message,
		scrollbar : true,
		yes : function(){
			$.post(url,postId,function(result){
				if(result.status == 0){
					return dialog.error(result.message);
				}
				if(result.status == 1){
					return dialog.success(result.message,result.data);
				}
			},"JSON");
		},
	});

});


$("#sb-submit").click(function(){
	var data = $("#sb-admin-form").serializeArray();
	postData = {};
	$(data).each(function(i){
		postData[this.name] = this.value;	
	});
	console.log(postData);
	url = SCOPE.edit_url;
	layer.open({
		type : 0,
		title : "是否提交",
		btn : ['yes','no'],
		icon : 3,
		closeBtin : 2,
		content : "是否提交",
		scrollbar : true,
		yes : function(){
			$.post(url,postData,function(result){
				if(result.status == 0){
					return dialog.error(result.message);
				}
				if(result.status == 1){
					return dialog.success(result.message,SCOPE.jump_url+"&catid="+result.data);
				}
			},"JSON");
		},
	});
});

	
$(function() {
        $('#file_upload').uploadify({
            'swf'      : SCOPE.ajax_upload_swf,
            'uploader' : SCOPE.ajax_upload_image_url,
            'buttonText': '上传图片',
            'fileTypeDesc': 'Image Files',
            'fileObjName' : 'file',
            //允许上传的文件后缀
            'fileTypeExts': '*.jpeg; *.gif; *.jpg; *.png',
            'onUploadSuccess' : function(file,data,response) {
                // response true ,false
                if(response) {
                    var obj = JSON.parse(data); //由JSON字符串转换为JSON对象

                    console.log(data);
                    $('#' + file.id).find('.data').html(' 上传完毕');

                    $("#upload_org_code_img").attr("src",obj.data);
                    $("#file_upload_image").attr('value',obj.data);
                    $("#upload_org_code_img").show();
                }else{
                    alert('上传失败');
                }
            },
        });
    });


var searchCatid = {
	search : function(catid,id){
		window.location.href="./admin.php?c=topArticle&a=edit&id="+id+"&catid="+catid;
	}
}


$("#news-comment-submit").click(function(){
	var data = $("#news-comment-form").serializeArray();
	postData = {};
	$(data).each(function(i){
		postData[this.name] = this.value;	
	});
	url = './index.php?c=newspage&a=comment';
	layer.open({
		type : 0,
		title : "是否提交",
		btn : ['yes','no'],
		icon : 3,
		closeBtin : 2,
		content : "是否提交",
		scrollbar : true,
		yes : function(){
			$.post(url,postData,function(result){
				if(result.status == 0){
					return dialog.error(result.message);
				}
				if(result.status == 1){
					return dialog.success(result.message,result.data);
				}
			},"JSON");
		},
	});
});