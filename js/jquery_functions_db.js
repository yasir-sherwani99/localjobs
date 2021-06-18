// JavaScript Document

	
		$(document).ready(function(){
			if($("#pakcity").val() == "-1"){
				$("#member_pak_city").hide();
				$("#member_other_city").show();
			}
			else{
				$("#member_pak_city").show();
				$("#member_other_city").hide();
			}
		});
		
		$(document).ready(function(){
		
		/*	$("#cancel_personal").click(function(){
				$(".edit_personal_info").hide();
			});
		*/	
		toggleFields();
	//	$("#member_pak_city").hide();
	//	$("#member_other_city").hide();
		
		$("#m_ctry").change(function() {
        	toggleFields();
    	});
		
			$("#edit-personal-statement").hide();
			$("#edit_personal").click(function(){
				$("#personal-statement").hide();
				$("#professional-summary").hide();
				$("#work-history").hide();
				$("#qualification").hide();
				$("#professional-skills").hide();
				$("#personal-info").hide();
				$("#looking-for").hide();
				$("#resume-cv").hide();
				$("#edit-personal-statement").show();
			});
			
			$("#edit-professional-summary").hide();
			$("#edit_professional").click(function(){
				$("#professional-summary").hide();
				$("#personal-statement").hide();
				$("#work-history").hide();
				$("#qualification").hide();
				$("#professional-skills").hide();
				$("#personal-info").hide();
				$("#looking-for").hide();
				$("#resume-cv").hide();
				$("#edit-professional-summary").show();
			});
			
			
		/*	$("#cancel").click(function(){
				$("#upload_image").hide();
			});
		*/	
			
			$("#edit-work-history").hide();
			$("#work_history").click(function(){
				$("#work-history").hide();
				$("#personal-statement").hide();
				$("#professional-summary").hide();
				$("#qualification").hide();
				$("#professional-skills").hide();
				$("#personal-info").hide();
				$("#looking-for").hide();
				$("#resume-cv").hide();
				$("#edit-work-history").show();
			});
		
		/*	$("#cancel2").click(function(){
				$("#update_cv").hide();
			});
		*/

			$("#edit-qualification").hide();
			$("#edit_qualification").click(function(){
				$("#qualification").hide();
				$("#personal-statement").hide();
				$("#professional-summary").hide();
				$("#work-history").hide();
				$("#professional-skills").hide();
				$("#personal-info").hide();
				$("#looking-for").hide();
				$("#resume-cv").hide();
				$("#edit-qualification").show();
			});
		
		/*	$("#cancel_summary").click(function(){
				$(".edit_mem_summary").hide();
			});
		*/	
			
			$("#edit-professional-skills").hide();
			$("#edit_skills").click(function(){
				$("#professional-skills").hide();
				$("#personal-statement").hide();
				$("#professional-summary").hide();
				$("#work-history").hide();
				$("#qualification").hide();
				$("#professional-skills").hide();
				$("#personal-info").hide();
				$("#looking-for").hide();
				$("#resume-cv").hide();
				$("#edit-professional-skills").show();
			});
			
		/*	$("#cancel_qual").click(function(){
				$(".edit_mem_qual").hide();
			});
		*/	

			$("#edit-personal-info").hide();
			$("#edit_personal_info").click(function(){
				$("#personal-info").hide();
				$("#personal-statement").hide();
				$("#professional-summary").hide();
				$("#work-history").hide();
				$("#qualification").hide();
				$("#professional-skills").hide();
				$("#looking-for").hide();
				$("#resume-cv").hide();
				$("#edit-personal-info").show();
			});
			
		/*	$("#cancel_emp").click(function(){
				$(".edit_empl_details").hide();
			});
		*/	
			
			$("#edit-looking-for").hide();
			$("#edit_looking").click(function(){
				$("#looking-for").hide();
				$("#personal-statement").hide();
				$("#professional-summary").hide();
				$("#work-history").hide();
				$("#qualification").hide();
				$("#professional-skills").hide();
				$("#personal-info").hide();
				$("#resume-cv").hide();
				$("#edit-looking-for").show();
			});
			/*
			$("#cancel_skills").click(function(){
				$(".edit_mem_skills").hide();
			});

			*/
		});

		function toggleFields() {
    		if($("#m_ctry").val() == "1"){
        		$("#member_pak_city").show();
				$("#member_other_city").hide();
			}
    		else{
        		$("#member_other_city").show();
				$("#member_pak_city").hide();
			}
		}

	