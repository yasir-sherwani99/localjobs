// JavaScript Document

	function emptyCheck(){
		var pass1 = document.getElementById("emp_pass").value;
		if(pass1 == ""){
			document.getElementById("error2").innerHTML = "Password is required";
			return false;
		}
		if(pass1.length < 6){
			document.getElementById("error2").innerHTML = "Atleast 6 characters";
			return false;
		}
		else{
			document.getElementById("error2").innerHTML = "<img src='images/checkmark2.png' style='width: 20px; height:18px;'>";
			return true;
		}

	}
	
	function emailCheck(){
		var email = document.getElementById("emp_email").value;
	/*	if(email.indexOf("@") == -1){
			document.getElementById("error").innerHTML = "Invalid e-mail address";
			return false;
		}
	*/
		if(email == ""){
			document.getElementById("error1").innerHTML = "E-mail is required";
			return false;
		}
		
		else{
			document.getElementById("error1").innerHTML = "<img src='images/checkmark2.png' style='width: 20px; height:18px;'>";
			return true;
		}

	}

	
	function checkPass(){
		var pass1 = document.getElementById("emp_pass").value;
		var pass2 = document.getElementById("emp_pass1").value;
		
		if(pass2 == ""){
			document.getElementById("error3").innerHTML = "Confirm Password required";
			return false;
		}
		if(pass1 != pass2){
			document.getElementById("error3").innerHTML = "Passwords do not match";
			return false;
		}
		else{
			document.getElementById("error3").innerHTML = "<img src='images/checkmark2.png' style='width: 20px; height:18px;'>";
			return true;
		}
	}
	
	function NameCheck(){
		var name = document.getElementById("emp_name").value;
		if(name == ""){
			document.getElementById("error4").innerHTML = "Name is required";
			return false;
		}
		else{
			document.getElementById("error4").innerHTML = "<img src='images/checkmark2.png' style='width: 20px; height:18px;'>";
			return true;
		}

	}

	function desigCheck(){
		var desig = document.getElementById("emp_desig").value;
		if(desig == ""){
			document.getElementById("error5").innerHTML = "Designation is required";
			return false;
		}
		else{
			document.getElementById("error5").innerHTML = "<img src='images/checkmark2.png' style='width: 20px; height:18px;'>";
			return true;
		}

	}

	function mobileCheck(){
		
		var mobile = document.getElementById("emp_mobile").value;
		if(mobile == ""){
			document.getElementById("error6").innerHTML = "Mobile is required";
			return false;
		}
		else{
			document.getElementById("error6").innerHTML = "<img src='images/checkmark2.png' style='width: 20px; height:18px;'>";
			return true;
		}

	}
	
	function compCheck(){
		var comp = document.getElementById("comp_name").value;
	//	var pattern = mobile.search(/^\d{4}-\d{7}$/);
		if(comp == ""){
			document.getElementById("error7").innerHTML = "Company Name required";
			return false;
		}
		else{
			document.getElementById("error7").innerHTML = "<img src='images/checkmark2.png' style='width: 20px; height:18px;'>";
			return true;
		}

	}
	
	function compaddrCheck(){
		var caddr = document.getElementById("comp_addr").value;
		if(caddr == ""){
			document.getElementById("error8").innerHTML = "Company Address required";
			return false;
		}
		else{
			document.getElementById("error8").innerHTML = "<img src='images/checkmark2.png' style='width: 20px; height:18px;'>";
			return true;
		}

	}

	function comptypeCheck(){
		var ctype = document.getElementById("comp_type").value;
		if(ctype == ""){
			document.getElementById("error9").innerHTML = "Company Type required";
			return false;
		}
		else{
			document.getElementById("error9").innerHTML = "<img src='images/checkmark2.png' style='width: 20px; height:18px;'>";
			return true;
		}

	}

	
	function cityCheck(){
		var city = document.getElementById("location").value;
		
		if(city == -1){
			document.getElementById("error10").innerHTML = "City is required";
			return false;
		}
		else{
			document.getElementById("error10").innerHTML = "<img src='images/checkmark2.png' style='width: 20px; height:18px;'>";
			return true;
		}

	}
	
	function othercityCheck(){
		var other_city = document.getElementById("other_city").value;
		
		if(other_city == ""){
			document.getElementById("error10").innerHTML = "&nbsp;";
			document.getElementById("error11").innerHTML = "City is required";
			return false;
		}
		else{
			document.getElementById("error11").innerHTML = "<img src='images/checkmark2.png' style='width: 20px; height:18px;'>";
			return true;
		}

	}

	function ctryCheck(){
		var ctry = document.getElementById("job_ctry").value;
		
		if(ctry == -1){
			document.getElementById("error12").innerHTML = "Country is required";
			return false;
		}
		else{
			document.getElementById("error12").innerHTML = "<img src='images/checkmark2.png' style='width: 20px; height:18px;'>";
			return true;
		}

	}
	
	function businessCheck(){
		var bus = document.getElementById("business").value;
		
		if(bus == -1){
			document.getElementById("error13").innerHTML = "Business is required";
			return false;
		}
		else{
			document.getElementById("error13").innerHTML = "<img src='images/checkmark2.png' style='width: 20px; height:18px;'>";
			return true;
		}

	}
	
	function industryCheck(){
		var indus = document.getElementById("industry").value;
		
		if(indus == -1){
			document.getElementById("error14").innerHTML = "Industry is required";
			return false;
		}
		else{
			document.getElementById("error14").innerHTML = "<img src='images/checkmark2.png' style='width: 20px; height:18px;'>";
			return true;
		}

	}
	
	function profileCheck(){
		var profile = document.getElementById("comp_profile").value;
		if(profile == ""){
			document.getElementById("error15").innerHTML = "Profile is required";
			return false;
		}
		else{
			document.getElementById("error15").innerHTML = "<img src='images/checkmark2.png' style='width: 20px; height:18px;'>";
			return true;
		}

	}
	
	function confirmSubmit(){
		
		if(!emailCheck()){
			document.getElementById("error1").innerHTML = "Valid Email is required";
			return false;
		}
		
		if(!checkPass() || !emptyCheck()){
			document.getElementById("error2").innerHTML = "Password is required";
			document.getElementById("error3").innerHTML = "Confirm Password is required";
			return false;
		}
		if(!NameCheck() || !desigCheck()){
			document.getElementById("error4").innerHTML = "Name is required";
			document.getElementById("error5").innerHTML = "Designation is required";
			return false;
		}
		if(!mobileCheck()){
			document.getElementById("error6").innerHTML = "Mobile is required";
			return false;
		}
		if(!compCheck()){
			document.getElementById("error7").innerHTML = "Company name is required";
			return false;
		}
		if(!compaddrCheck()){
			document.getElementById("error8").innerHTML = "Company address is required";
			return false;
		}
		if(!comptypeCheck()){
			document.getElementById("error9").innerHTML = "Company type is required";
			return false;
		}
		if(!cityCheck() || !ctryCheck()){
			document.getElementById("error10").innerHTML = "City is required";
			document.getElementById("error12").innerHTML = "Country is required";
			return false;
		}
		if(!businessCheck()){
			document.getElementById("error13").innerHTML = "Business type is required";
			return false;
		}
		if(!industryCheck()){
			document.getElementById("error14").innerHTML = "Category is required";
			return false;
		}
		if(!profileCheck()){
			document.getElementById("error15").innerHTML = "Industry is required";
			return false;
		}

		else{
			return true;
		}
	}

