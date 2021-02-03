$(document).ready(function(){
	$("#status_btn").click(function(){
	var status=$("#status_box").val();
			
		$.ajax({
		method:"post",
		url:"./post.php?",
		data:status,
		success:function(status)
		{
		   $("#status_erro").html(status);
		}
		
		
		});
		
	
	});
});