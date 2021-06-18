// JavaScript Document

	function emptyCheck(){
		var pass1 = document.getElementById("emp_pass").value;
		if(pass1 == ""){
			document.getElementById("error2").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Password is required";
			return false;
		}
		if(pass1.length < 6){
			document.getElementById("error2").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Atleast 6 characters";
			return false;
		}
		else{
			document.getElementById("error2").innerHTML = "<img src='images/checkmark2.png' style='width: 20px; height:18px;'>";
			return true;
		}

	}
	
	function emailCheck(){
		var email = document.getElementById("emp_email").value;
	
		if(email == ""){
			document.getElementById("error1").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;E-mail is required";
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
			document.getElementById("error3").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Confirm Password required";
			return false;
		}
		if(pass1 != pass2){
			document.getElementById("error3").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Passwords do not match";
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
			document.getElementById("error4").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Name is required";
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
			document.getElementById("error5").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Designation is required";
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
			document.getElementById("error6").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Mobile is required";
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
			document.getElementById("error7").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Company Name required";
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
			document.getElementById("error8").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Company Address required";
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
			document.getElementById("error9").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Company Type required";
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
			document.getElementById("error10").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;City is required";
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
			document.getElementById("error11").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;City is required";
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
			document.getElementById("error12").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Country is required";
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
			document.getElementById("error13").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Business is required";
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
			document.getElementById("error14").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Industry is required";
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
			document.getElementById("error15").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Profile is required";
			return false;
		}
		else{
			document.getElementById("error15").innerHTML = "<img src='images/checkmark2.png' style='width: 20px; height:18px;'>";
			return true;
		}

	}
	
	function confirmSubmit1(){
		
		var email = document.getElementById("emp_email").value;
		var pass1 = document.getElementById("emp_pass").value;
		var pass2 = document.getElementById("emp_pass1").value;
		var name = document.getElementById("emp_name").value;
		var desig = document.getElementById("emp_desig").value;
		var mobile = document.getElementById("emp_mobile").value;
		var comp = document.getElementById("comp_name").value;
		var caddr = document.getElementById("comp_addr").value;
		var ctype = document.getElementById("comp_type").value;
		var ctry = document.getElementById("job_ctry").value;
		var city = document.getElementById("location").value;
		var other_city = document.getElementById("other_city").value;
		var bus = document.getElementById("business").value;
		var indus = document.getElementById("industry").value;
		var profile = document.getElementById("comp_profile").value;
	
		if(email == ""){
			document.getElementById("error1").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Company E-mail is required";
			return false;
		}
		
		if(pass1 == ""){
			document.getElementById("error2").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Password is required";
			return false;
		}
		
		if(pass1.length < 6){
			document.getElementById("error2").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Atleast 6 characters";
			return false;
		}	
		
		if(pass2 == ""){
			document.getElementById("error3").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Confirm Password required";
			return false;
		}
		
		if(pass1 != pass2){
			document.getElementById("error3").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Passwords do not match";
			return false;
		}

		if(name == ""){
			document.getElementById("error4").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Name is required";
			return false;
		}
		
		if(desig == ""){
			document.getElementById("error5").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Designation is required";
			return false;
		}
		
		if(mobile == ""){
			document.getElementById("error6").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Mobile is required";
			return false;
		}

		if(comp == ""){
			document.getElementById("error7").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Company Name required";
			return false;
		}

		if(caddr == ""){
			document.getElementById("error8").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Company Address required";
			return false;
		}

		if(ctype == ""){
			document.getElementById("error9").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Company Type required";
			return false;
		}
		
		if(ctry == -1){
			document.getElementById("error12").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Country is required";
			return false;
		}
		
		if(ctry == "1" && city == "-1"){
			document.getElementById("error10").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;City is required";
			return false;
		}
		
		if(ctry != "1" && other_city == ""){
			document.getElementById("error10").innerHTML = "&nbsp;";
			document.getElementById("error11").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;City is required";
			return false;
		}
				
		if(bus == -1){
			document.getElementById("error13").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Business is required";
			return false;
		}
		
		if(indus == -1){
			document.getElementById("error14").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Industry is required";
			return false;
		}
		
		if(profile == ""){
			document.getElementById("error15").innerHTML = "<span class='glyphicon glyphicon-alert'></span>&nbsp;Profile is required";
			return false;
		}
		
		else{
			window.alert("Thank you for creating your profile at localjobs.pk");
			return true;
		}
	}