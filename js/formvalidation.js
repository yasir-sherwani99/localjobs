// JavaScript Document

	function emptyCheck(){
		var pass1 = document.getElementById("m_pass").value;
		if(pass1 == ""){
			document.getElementById("error1").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Password is required";
			pass1.focus();
			return false;
		}
		if(pass1.length < 6){
			document.getElementById("error1").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Must be atleast 6 characters";
			return false;
		}
		else{
			document.getElementById("error1").innerHTML = "<img src='images/icons2/checkmark2.png' style='width: 20px; height:18px; margin-left: 5px; margin-top: 3px;'>";
			return true;
		}

	}
	
	function emailCheck(){
		var email = document.getElementById("email").value;

		if(email == ""){
			document.getElementById("error").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Invalid e-mail address";
			return false;
		}
		
		else{
			document.getElementById("error").innerHTML = "&nbsp;";
			document.getElementById("error").innerHTML = "<img src='images/icons2/checkmark2.png' style='width: 20px; height:18px; margin-left: 5px; margin-top: 3px;'>";
			return true;
		}

	}

	
	function checkPass(){
		var pass1 = document.getElementById("m_pass").value;
		var pass2 = document.getElementById("m_pass1").value;
		
		if(pass2 == ""){
			document.getElementById("error2").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Confirm Password is required";
			pass2.focus();
			return false;
		}
		if(pass1 != pass2){
			document.getElementById("error2").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Passwords do not match, try again";
			pass1.focus();
			pass2.focus();
			return false;
		}
		else{
			document.getElementById("error2").innerHTML = "&nbsp;";
			document.getElementById("error2").innerHTML = "<img src='images/icons2/checkmark2.png' style='width: 20px; height:18px; margin-left: 5px; margin-top: 3px;'>";
			return true;
		}
	}
	
	function fNameCheck(){
		var fname = document.getElementById("f_name").value;
		if(fname == ""){
			document.getElementById("error3").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;First Name is required";
			return false;
		}
		else{
			document.getElementById("error3").innerHTML = "&nbsp;";
			document.getElementById("error3").innerHTML = "<img src='images/icons2/checkmark2.png' style='width: 20px; height:18px; margin-left: 5px; margin-top: 3px;'>";
			return true;
		}

	}

	function lNameCheck(){
		var lname = document.getElementById("l_name").value;
		if(lname == ""){
			document.getElementById("error4").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Last Name is required";
			return false;
		}
		else{
			document.getElementById("error4").innerHTML = "&nbsp;";
			document.getElementById("error4").innerHTML = "<img src='images/icons2/checkmark2.png' style='width: 20px; height:18px; margin-left: 5px; margin-top: 3px;'>";
			return true;
		}

	}

	function genderCheck(){
				
		var gender = document.getElementById("m_gender").value;
		if(gender == ""){
			document.getElementById("error5").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Gender is required";
			return false;
		}
		else{
			document.getElementById("error5").innerHTML = "&nbsp;";
			document.getElementById("error5").innerHTML = "<img src='images/icons2/checkmark2.png' style='width: 20px; height:18px; margin-left: 5px; margin-top: 3px;'>";
			return true;
		}

	}

	function checkDOB(){
		var day = document.getElementById("dob_day").value;
		var month = document.getElementById("dob_month").value;
		var year = document.getElementById("dob_year").value;
		
		if(day == -1){
			document.getElementById("error6").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Day is required";
			return false;
		}
		if(month == -1){
			document.getElementById("error6").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Month is required";
			return false;
		}
		if(year == -1){
			document.getElementById("error6").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Year is required";
			return false;
		}
		else{
			document.getElementById("error6").innerHTML = "&nbsp;";
			document.getElementById("error6").innerHTML = "<img src='images/icons2/checkmark2.png' style='width: 20px; height:18px; margin-left: 5px; margin-top: 3px;'>";
			return true;
		}
	}
	
	function cityCheck(){
		var city = document.getElementById("location").value;
		
		if(city == -1){
			document.getElementById("error30").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;City is required";
			return false;
		}
	
		else{
			document.getElementById("error30").innerHTML = "&nbsp;";
			document.getElementById("error30").innerHTML = "<img src='images/icons2/checkmark2.png' style='width: 20px; height:18px; margin-left: 5px; margin-top: 3px;'>";
			return true;
		}

	}
	
	function othercityCheck(){
		var other_city = document.getElementById("other_location").value;
		
		if(other_city == ""){
			document.getElementById("error30").innerHTML = "&nbsp;";
			document.getElementById("error31").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;City is required";
			return false;
		}
		else{
			document.getElementById("error31").innerHTML = "&nbsp;";
			document.getElementById("error31").innerHTML = "<img src='images/icons2/checkmark2.png' style='width: 20px; height:18px; margin-left: 5px; margin-top: 3px;'>";
			return true;
		}

	}

	function ctryCheck(){
		var ctry = document.getElementById("m_ctry").value;
		
		if(ctry == -1){
			document.getElementById("error7").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Country is required";
			return false;
		}
		else{
			document.getElementById("error7").innerHTML = "&nbsp;";
			document.getElementById("error7").innerHTML = "<img src='images/icons2/checkmark2.png' style='width: 20px; height:18px; margin-left: 5px; margin-top: 3px;'>";
			return true;
		}

	}

	function mobileCheck(){
		var mobile = document.getElementById("m_mobile").value;
	//	var pattern = mobile.search(/^\d{4}-\d{7}$/);
		if(mobile == ""){
			document.getElementById("error8").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Mobile is required";
			return false;
		}
		else{
			document.getElementById("error8").innerHTML = "&nbsp;";
			document.getElementById("error8").innerHTML = "<img src='images/icons2/checkmark2.png' style='width: 20px; height:18px; margin-left: 5px; margin-top: 3px;'>";
			return true;
		}

	}
	
	function degreeCheck(){
		var degree = document.getElementById("m_edu_level").value;
		if(degree == -1){
			document.getElementById("error10").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Select highest degree achieved";
			return false;
		}
		else{
			document.getElementById("error10").innerHTML = "&nbsp;";
			document.getElementById("error10").innerHTML = "<img src='images/icons2/checkmark2.png' style='width: 20px; height:18px; margin-left: 5px; margin-top: 3px;'>";
			return true;
		}

	}
	
	function degreeTitleCheck(){
		var title = document.getElementById("degree_title").value;
		if(title == ""){
			document.getElementById("error11").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Degree title is required";
			return false;
		}
		else{
			document.getElementById("error11").innerHTML = "&nbsp;";
			document.getElementById("error11").innerHTML = "<img src='images/icons2/checkmark2.png' style='width: 20px; height:18px; margin-left: 5px; margin-top: 3px;'>";
			return true;
		}

	}

	function majorsCheck(){
		var major = document.getElementById("majors").value;
		if(major == ""){
			document.getElementById("error12").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Major Subjects is required";
			return false;
		}
		else{
			document.getElementById("error12").innerHTML = "&nbsp;";
			document.getElementById("error12").innerHTML = "<img src='images/icons2/checkmark2.png' style='width: 20px; height:18px; margin-left: 5px; margin-top: 3px;'>";
			return true;
		}

	}

	function educityCheck(){
		var icity = document.getElementById("institute_city").value;
		if(icity == ""){
			document.getElementById("error46").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;City is required";
			return false;
		}
		else{
			document.getElementById("error46").innerHTML = "&nbsp;";
			document.getElementById("error46").innerHTML = "<img src='images/icons2/checkmark2.png' style='width: 20px; height:18px; margin-left: 5px; margin-top: 3px;'>";
			return true;
		}

	}
	
	function eductryCheck(){
		var ictry = document.getElementById("institute_ctry").value;
		if(ictry == -1){
			document.getElementById("error13").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Country is required";
			return false;
		}
		else{
			document.getElementById("error13").innerHTML = "&nbsp;";
			document.getElementById("error13").innerHTML = "<img src='images/icons2/checkmark2.png' style='width: 20px; height:18px; margin-left: 5px; margin-top: 3px;'>";
			return true;
		}

	}
	
	function eduInsCheck(){
		var inst = document.getElementById("institute_name").value;
		if(inst == ""){
			document.getElementById("error14").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Institute name is required";
			return false;
		}
		else{
			document.getElementById("error14").innerHTML = "&nbsp;";
			document.getElementById("error14").innerHTML = "<img src='images/icons2/checkmark2.png' style='width: 20px; height:18px; margin-left: 5px; margin-top: 3px;'>";
			return true;
		}

	}

	function eduyearCheck(){
		var comp_year = document.getElementById("complete_year").value;
		if(comp_year == -1){
			document.getElementById("error15").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Year is required";
			return false;
		}
		else{
			document.getElementById("error15").innerHTML = "&nbsp;";
			document.getElementById("error15").innerHTML = "<img src='images/icons2/checkmark2.png' style='width: 20px; height:18px; margin-left: 5px; margin-top: 3px;'>";
			return true;
		}

	}
	
	function expCheck(){
		var exp1 = document.getElementById("experience").value;

		if(exp1 == -1){
			document.getElementById("error16").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Experience is required";
			return false;
		}
		else{
			document.getElementById("error16").innerHTML = "&nbsp;";
			document.getElementById("error16").innerHTML = "<img src='images/icons2/checkmark2.png' style='width: 20px; height:18px; margin-left: 5px; margin-top: 3px;'>";
			return true;
		}
	}

	
	function industryCheck(){
		var industry = document.getElementById("industry").value;
		if(industry == -1){
			document.getElementById("error18").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Profession Industry is required";
			return false;
		}
		else{
			document.getElementById("error18").innerHTML = "&nbsp;";
			document.getElementById("error18").innerHTML = "<img src='images/icons2/checkmark2.png' style='width: 20px; height:18px; margin-left: 5px; margin-top: 3px;'>"
			return true;
		}

	}
	
	function jobexpCheck(){
		var years = document.getElementById("m_exp_year").value;
		var months = document.getElementById("m_exp_month").value;
		
		if(years == ""){
			document.getElementById("error17").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Year is required";
			return false;
		}
		if(months == -1){
			document.getElementById("error17").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Month is required";
			return false;
		}
		else{
			document.getElementById("error17").innerHTML = "&nbsp;";
			document.getElementById("error17").innerHTML = "<img src='images/icons2/checkmark2.png' style='width: 20px; height:18px; margin-left: 5px; margin-top: 3px;'>";
			return true;
		}
	}

	function firstjobDate(){
		var jday = document.getElementById("job_start_day").value;
		var jmonth = document.getElementById("job_start_month").value;
		var jyear = document.getElementById("job_start_year").value;
		
		if(jday == -1){
			document.getElementById("error19").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Day is required";
			return false;
		}
		if(jmonth == -1){
			document.getElementById("error19").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Month is required";
			return false;
		}
		if(jyear == -1){
			document.getElementById("error19").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Year is required";
			return false;
		}
		else{
			document.getElementById("error19").innerHTML = "&nbsp;";
			document.getElementById("error19").innerHTML = "<img src='images/icons2/checkmark2.png' style='width: 20px; height:18px; margin-left: 5px; margin-top: 3px;'>";
			return true;
		}
	}
	
	function currentJob(){
		var curr_job = document.getElementById("current_job_title").value;
		if(curr_job == ""){
			document.getElementById("error20").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Present Job Title is required";
			return false;
		}
		else{
			document.getElementById("error20").innerHTML = "&nbsp;";
			document.getElementById("error20").innerHTML = "<img src='images/icons2/checkmark2.png' style='width: 20px; height:18px; margin-left: 5px; margin-top: 3px;'>"
			return true;
		}

	}


	function jobperiodCheck(){
		var cday = document.getElementById("current_start_day").value;
		var cmonth = document.getElementById("current_start_month").value;
		var cyear = document.getElementById("current_start_year").value;
		var endyear = document.getElementById("current_end_year").value;
		
		if(cday == -1){
			document.getElementById("error21").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Day is required";
			return false;
		}
		if(cmonth == -1){
			document.getElementById("error21").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Month is required";
			return false;
		}
		if(cyear == -1){
			document.getElementById("error21").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Year is required";
			return false;
		}
		if(endyear == -1){
			document.getElementById("error21").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;End Year is required";
			return false;
		}
		else{
			document.getElementById("error21").innerHTML = "&nbsp;";
			document.getElementById("error21").innerHTML = "<img src='images/icons2/checkmark2.png' style='width: 20px; height:18px; margin-left: 5px; margin-top: 3px;'>";
			return true;
		}
	}
	
	function companyCheck(){
		var comp = document.getElementById("comp_name").value;
		if(comp == ""){
			document.getElementById("error22").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Company name is required";
			return false;
		}
		else{
			document.getElementById("error22").innerHTML = "&nbsp;";
			document.getElementById("error22").innerHTML = "<img src='images/icons2/checkmark2.png' style='width: 20px; height:18px; margin-left: 5px; margin-top: 3px;'>";
			return true;
		}

	}

	function compctryCheck(){
		var cctry = document.getElementById("comp_ctry").value;
		if(cctry == -1){
			document.getElementById("error23").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Company Country required";
			return false;
		}
		else{
			document.getElementById("error23").innerHTML = "&nbsp;";
			document.getElementById("error23").innerHTML = "<img src='images/icons2/checkmark2.png' style='width: 20px; height:18px; margin-left: 5px; margin-top: 3px;'>";
			return true;
		}

	}
	
	function compctryCheck(){
		var ccity = document.getElementById("comp_city").value;
		if(ccity == ""){
			document.getElementById("error24").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Company City required";
			return false;
		}
		else{
			document.getElementById("error24").innerHTML = "&nbsp;";
			document.getElementById("error24").innerHTML = "<img src='images/icons2/checkmark2.png' style='width: 20px; height:18px; margin-left: 5px; margin-top: 3px;'>";
			return true;
		}

	}

	function preferjobCheck(){
		var pjob = document.getElementById("prefer_job").value;
		if(pjob == ""){
			document.getElementById("error33").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Prefer Job required";
			return false;
		}
		else{
			document.getElementById("error33").innerHTML = "&nbsp;";
			document.getElementById("error33").innerHTML = "<img src='images/icons2/checkmark2.png' style='width: 20px; height:18px; margin-left: 5px; margin-top: 3px;'>";
			return true;
		}

	}


	function resumeCheck(){
		var cv = document.getElementById("cv_headline").value;
		if(cv == ""){
			document.getElementById("error25").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;CV headline required";
			return false;
		}
		else{
			document.getElementById("error25").innerHTML = "&nbsp;";
			document.getElementById("error25").innerHTML = "<img src='images/icons2/checkmark2.png' style='width: 20px; height:18px; margin-left: 5px; margin-top: 3px;'>";
			return true;
		}

	}
	
	function cvuploadCheck(){
		var upload = document.getElementById("m_cv").value;
		if(upload == ""){
			document.getElementById("error26").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Select your CV";
			return false;
		}
		else{
			document.getElementById("error26").innerHTML = "&nbsp;";
			document.getElementById("error26").innerHTML = "<img src='images/icons2/checkmark2.png' style='width: 20px; height:18px; margin-left: 5px; margin-top: 3px;'>";
			return true;
		}

	}


	function confirmSubmit1(){
		
		var email = document.getElementById("email").value;
	    var pass2 = document.getElementById("m_pass1").value;
		var pass1 = document.getElementById("m_pass").value;
		var fname = document.getElementById("f_name").value;
		var lname = document.getElementById("l_name").value;
	//	var gender = document.getElementById("m_gender").value;
		var day = document.getElementById("dob_day").value;
		var month = document.getElementById("dob_month").value;
		var year = document.getElementById("dob_year").value;
		var ctry = document.getElementById("m_ctry").value;
		var city = document.getElementById("location").value;
		var other_city = document.getElementById("other_location").value;
		var mobile = document.getElementById("m_mobile").value;
		var degree = document.getElementById("m_edu_level").value;
		var title = document.getElementById("degree_title").value;
		var major = document.getElementById("majors").value;
		var icity = document.getElementById("institute_city").value;
		var ictry = document.getElementById("institute_ctry").value;
		var inst = document.getElementById("institute_name").value;
		var comp_year = document.getElementById("complete_year").value;
		var industry = document.getElementById("industry").value;
		var total_years_exp = document.getElementById("m_exp_year").value;
		var total_months_exp = document.getElementById("m_exp_month").value;
		var exp1 = document.getElementById("experience").value;
		var jday = document.getElementById("job_start_day").value;
		var jmonth = document.getElementById("job_start_month").value;
		var jyear = document.getElementById("job_start_year").value;
		var pjob = document.getElementById("prefer_job").value;
		var cv = document.getElementById("cv_headline").value;
		var upload = document.getElementById("m_cv").value;
			
		if(email == ""){
			document.getElementById("error").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;E-mail address is required";
			return false;
		}
		
		if(pass1 == ""){
			document.getElementById("error1").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Password is required";
			return false;
		}
				
		if(pass2 == ""){
			document.getElementById("error2").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Confirm Password is required";
			return false;
		}
		
		if(pass1 != pass2){
			document.getElementById("error2").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Passwords do not match, try again";
			return false;
		}
				
		if(pass1.length < 6){
			document.getElementById("error1").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Password must be atleast 6 characters";
			return false;
		}
		
		if(fname == ""){
			document.getElementById("error3").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;First Name is required";
			return false;
		}
	
		if(lname == ""){
			document.getElementById("error4").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Last Name is required";
			return false;
		}
			
		if(day == "-1"){
			document.getElementById("error6").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Day is required";
			return false;
		}
		
		if(month == "-1"){
			document.getElementById("error6").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Month is required";
			return false;
		}
		
		if(year == "-1"){
			document.getElementById("error6").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Year is required";
			return false;
		}
		
		if(ctry == "-1"){
			document.getElementById("error7").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Country of Birth is required";
			return false;
		}
		if(ctry == "1" && city == "-1"){
			document.getElementById("error30").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;City of Birth is required";
			return false;
		}
		if(ctry != "1" && other_city == ""){
			document.getElementById("error31").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;City of Birth is required";
			return false;
		}
				
		if(mobile == ""){
			document.getElementById("error8").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Mobile number is required";
			return false;
		}
	
		if(degree == "-1"){
			document.getElementById("error10").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Select highest degree achieved";
			return false;
		}  
			
		if(industry == "-1"){
			document.getElementById("error18").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Profession Industry is required";
			return false;
		}
		
		if(exp1 == "-1"){
			document.getElementById("error16").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Experience is required";
			return false;
		}
	
		if(pjob == ""){
			document.getElementById("error33").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Prefer Job required";
			return false;
		}
		
		if(cv == ""){
			document.getElementById("error25").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;CV headline required";
			return false;
		}
	
		if(upload == ""){
			document.getElementById("error26").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Select your CV";
			return false;
		}  
		
		else{
			window.alert("Thank you for creating your profile at localjobs.pk");
			return true;
		}
	}