// JavaScript Document

	function emptyCheck(){
		var pass1 = document.getElementById("m_pass").value;
		if(pass1 == ""){
			document.getElementById("error1").innerHTML = "Password is required";
			return false;
		}
		if(pass1.length < 6){
			document.getElementById("error1").innerHTML = "Must be atleast 6 characters";
			return false;
		}
		else{
			document.getElementById("error1").innerHTML = "<img src='images/icons2/checkmark2.png' style='width: 20px; height:18px; margin-left: 5px; margin-top: 3px;'>";
			return true;
		}

	}
	
	function emailCheck(){
		var email = document.getElementById("email").value;
	/*	if(email.indexOf("@") == -1){
			document.getElementById("error").innerHTML = "Invalid e-mail address";
			return false;
		}
	*/
		if(email == ""){
			document.getElementById("error").innerHTML = "Invalid e-mail address";
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
			document.getElementById("error2").innerHTML = "Confirm Password is required";
			return false;
		}
		if(pass1 != pass2){
			document.getElementById("error2").innerHTML = "Passwords do not match, try again";
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
			document.getElementById("error3").innerHTML = "First Name is required";
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
			document.getElementById("error4").innerHTML = "Last Name is required";
			return false;
		}
		else{
			document.getElementById("error4").innerHTML = "&nbsp;";
			document.getElementById("error4").innerHTML = "<img src='images/icons2/checkmark2.png' style='width: 20px; height:18px; margin-left: 5px; margin-top: 3px;'>";
			return true;
		}

	}

	function genderCheck(){
		
	/*	switch(gender){
			case "Male":
				document.getElementById("correct6").innerHTML = "<img src='images/icons2/checkmark2.png' style='width: 20px; height:18px;'>";
				document.getElementById("error5").innerHTML = "&nbsp";
				break;
			case "Female":
				document.getElementById("correct6").innerHTML = "<img src='images/icons2/checkmark2.png' style='width: 20px; height:18px;'>";
				document.getElementById("error5").innerHTML = "&nbsp";
				break;
			default:
				document.getElementById("error5").innerHTML = "Gender is required";
				break;
		}  */
		
		var gender = document.getElementById("m_gender").value;
		if(gender == ""){
			document.getElementById("error5").innerHTML = "Gender is required";
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
			document.getElementById("error6").innerHTML = "Day is required";
			return false;
		}
		if(month == -1){
			document.getElementById("error6").innerHTML = "Month is required";
			return false;
		}
		if(year == -1){
			document.getElementById("error6").innerHTML = "Year is required";
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
			document.getElementById("error30").innerHTML = "City is required";
			return false;
		}
		if(city == 28){
			document.getElementById("error30").innerHTML = "&nbsp;";
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
			document.getElementById("error31").innerHTML = "City is required";
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
			document.getElementById("error7").innerHTML = "Country is required";
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
			document.getElementById("error8").innerHTML = "Mobile is required";
			return false;
		}
	/*	if(pattern != 0){
			document.getElementById("error8").innerHTML = "&nbsp;Correct Pattern e.g 0300-1234567";
			return false;
		}  */
		else{
			document.getElementById("error8").innerHTML = "&nbsp;";
			document.getElementById("error8").innerHTML = "<img src='images/icons2/checkmark2.png' style='width: 20px; height:18px; margin-left: 5px; margin-top: 3px;'>";
			return true;
		}

	}
	
	function degreeCheck(){
		var degree = document.getElementById("m_edu_level").value;
		if(degree == -1){
			document.getElementById("error10").innerHTML = "Select highest degree achieved";
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
			document.getElementById("error11").innerHTML = "Degree title is required";
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
			document.getElementById("error12").innerHTML = "Major Subjects is required";
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
			document.getElementById("error46").innerHTML = "City is required";
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
			document.getElementById("error13").innerHTML = "Country is required";
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
			document.getElementById("error14").innerHTML = "Institute name is required";
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
			document.getElementById("error15").innerHTML = "Year is required";
			return false;
		}
		else{
			document.getElementById("error15").innerHTML = "&nbsp;";
			document.getElementById("error15").innerHTML = "<img src='images/icons2/checkmark2.png' style='width: 20px; height:18px; margin-left: 5px; margin-top: 3px;'>";
			return true;
		}

	}
	
	function expCheck(){
		var exp = document.getElementById("experience").value;
/*		
		switch(exp){
			case "Yes":
				document.getElementById("error16").innerHTML = "&nbsp;";
				document.getElementById("correct19").innerHTML = "<img src='images/icons2/checkmark2.png' style='width: 20px; height:18px;'>";
				break;
			case "No":
				document.getElementById("error16").innerHTML = "&nbsp;";
				document.getElementById("correct19").innerHTML = "<img src='images/icons2/checkmark2.png' style='width: 20px; height:18px;'>";
				break;
			default:
				document.getElementById("correct19").innerHTML = "&nbsp;";
				document.getElementById("error16").innerHTML = "&nbsp;Experience is required";
				break;
		}
*/
		if(exp == -1){
			document.getElementById("error16").innerHTML = "Experience is required";
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
			document.getElementById("error18").innerHTML = "Profession Industry is required";
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
			document.getElementById("error17").innerHTML = "Year is required";
			return false;
		}
		if(months == -1){
			document.getElementById("error17").innerHTML = "Month is required";
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
			document.getElementById("error19").innerHTML = "Day is required";
			return false;
		}
		if(jmonth == -1){
			document.getElementById("error19").innerHTML = "Month is required";
			return false;
		}
		if(jyear == -1){
			document.getElementById("error19").innerHTML = "Year is required";
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
			document.getElementById("error20").innerHTML = "Present Job Title is required";
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
			document.getElementById("error21").innerHTML = "Day is required";
			return false;
		}
		if(cmonth == -1){
			document.getElementById("error21").innerHTML = "Month is required";
			return false;
		}
		if(cyear == -1){
			document.getElementById("error21").innerHTML = "Year is required";
			return false;
		}
		if(endyear == -1){
			document.getElementById("error21").innerHTML = "End Year is required";
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
			document.getElementById("error22").innerHTML = "Company name is required";
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
			document.getElementById("error23").innerHTML = "Company Country required";
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
			document.getElementById("error24").innerHTML = "Company City required";
			return false;
		}
		else{
			document.getElementById("error24").innerHTML = "&nbsp;";
			document.getElementById("error24").innerHTML = "<img src='images/icons2/checkmark2.png' style='width: 20px; height:18px; margin-left: 5px; margin-top: 3px;'>";
			return true;
		}

	}


	function resumeCheck(){
		var cv = document.getElementById("cv_headline").value;
		if(cv == ""){
			document.getElementById("error25").innerHTML = "CV headline required";
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
			document.getElementById("error26").innerHTML = "Select your CV";
			return false;
		}
		else{
			document.getElementById("error26").innerHTML = "&nbsp;";
			document.getElementById("error26").innerHTML = "<img src='images/icons2/checkmark2.png' style='width: 20px; height:18px; margin-left: 5px; margin-top: 3px;'>";
			return true;
		}

	}


	
	function confirmSubmit(){
		
		if(!emailCheck()){
			document.getElementById("error").innerHTML = "Valid Email is required";
			return false;
		}
		
		if(!checkPass()){
			document.getElementById("error1").innerHTML = "Password is required";
			return false;
		}
		if(!emptyCheck()){
			document.getElementById("error2").innerHTML = "Confirm Password is required";
			return false;
		}
		if(!fNameCheck()){
			document.getElementById("error3").innerHTML = "First name is required";
			return false;
		}
		if(!lNameCheck()){
			document.getElementById("error4").innerHTML = "Last name is required";
			return false;
		}
		if(!genderCheck()){
			document.getElementById("error5").innerHTML = "Gender is required";
			return false;
		}
		if(!checkDOB()){
			document.getElementById("error6").innerHTML = "Date of Birth is required";
			return false;
		}
		if(!cityCheck()){
			document.getElementById("error30").innerHTML = "City is required";
			return false;
		}
		if(!ctryCheck()){
			document.getElementById("error7").innerHTML = "Country is required";
			return false;
		}
		if(!mobileCheck()){
			document.getElementById("error8").innerHTML = "Mobile no. is required";
			return false;
		}
		if(!degreeCheck()){
			document.getElementById("error10").innerHTML = "Higest degree is required";
			return false;
		}
		if(!industryCheck()){
			document.getElementById("error18").innerHTML = "Profession Industry is required";
			return false;
		}
		if(!expCheck()){
			document.getElementById("error16").innerHTML = "Experience is required";
			return false;
		}
		if(!resumeCheck()){
			document.getElementById("error25").innerHTML = "CV/Resume headline is required";
			return false;
		}
		if(!cvuploadCheck()){
			document.getElementById("error26").innerHTML = "Upload CV/Resume";
			return false;
		}

		else{
		//	window.alert("Form is successfully submitted...");
			return true;
		}
	}

