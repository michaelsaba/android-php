$(document).ready(function(){
	$("#status_btn").click(function(){
	var text=$("#status_box").val();
		
		data="t="+text;
		
		$.ajax({
		method:"post",
		url:"conf/post.php?",
		data:data,
		success:function(data)
		{
					$("#status_erro").html(data);
		}
		
		
		});
		
	
	});
});