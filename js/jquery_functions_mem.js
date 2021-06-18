// JavaScript Document

	

	$(document).ready(function(){
		$("#email").blur(function(){
			var user_email = $("#email").val();
			var user_pass = $("#pass").val();
			var user_pass1 = $("#pass1").val();
		//	var user_pass = $("#pass").val();
		/*	$.post("test1.php",{email:user_email},function(data){
				$("#error").html(data);
			});  */
			
			$.ajax({
				url:'test1.php',
				data:{email:user_email,pass:user_pass,pass1:user_pass1},
				type:'POST',
				success:function(data){
					$("#error").html(data);
//					$("#correct").html(data);
				}
			});
		});
	});
	
	$(document).ready(function(){
	    toggleFields(); 
		toggleEdu();
		toggleExp();
		$("#pak_location").hide();
		$("#other_loc").hide();
		
    	$("#m_ctry").change(function() {
        	toggleFields();
    	});
		
		$(".hide_edu_details").hide();
		$("#m_edu_level").change(function() {
        	toggleEdu();
    	});
		
		$(".exp_hide").hide();
		$("#experience").change(function() {
        	toggleExp();
    	});

	});


	function toggleFields() {
    	if($("#m_ctry").val() == 1){
        	$("#pak_location").show();
			$("#other_loc").hide();
		}
    	else{
        	$("#other_loc").show();
			$("#pak_location").hide();
		}
	}
	
	function toggleEdu() {
		
    	if($("#m_edu_level").val() == "No Formal Education")
        	$(".hide_edu_details").hide();
    	else
        	$(".hide_edu_details").show();
	}
	
	function toggleExp() {
		
    	if($("#experience").val() == "Yes")
        	$(".exp_hide").show();
    	else
        	$(".exp_hide").hide();
	}
	

