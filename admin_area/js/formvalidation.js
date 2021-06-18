// JavaScript Document

	function myClock(){
		var time = new Date();
			hours = time.getHours();
			minutes = time.getMinutes();
			sec = time.getSeconds();
			
			//to add a zero in front of numbers<10

			hours = checkTime(hours)
			minutes = checkTime(minutes)
			sec = checkTime(sec)
	
			document.getElementById("clock").innerHTML = hours + ":" + minutes;
				timer = setTimeout(function(){
					myClock(),500
				});
		}
		
		function checkTime(i){
			if (i<10){
				 i="0" + i
			}
			return i
		}


	function jobTitle(){
		var title =  document.getElementById("title").value;
		if(title == ""){
			document.getElementById("error1").innerHTML = "Job Title is required";
			return false;
		}
		else{
			document.getElementById("error1").innerHTML = "<img src='images/checkmark2.png' width='20' height='20'>";
			return true;
			
		}
	}		

	function jobDesc(){
		var desc =  document.getElementById("desc").value;
		if(desc == ""){
			document.getElementById("error2").innerHTML = "Job Description is required";
			return false;
		}
		if(desc.length < 10){
			document.getElementById("error2").innerHTML = "Job Description is required";
			return false;
		}
		else{
			document.getElementById("error2").innerHTML = "<img src='images/checkmark2.png' width='20' height='20'>";
			return true;
			
		}
	}

	function jobRequire(){
		var require =  document.getElementById("require").value;
		if(require == ""){
			document.getElementById("error9").innerHTML = "Job Requirement is required";
			return false;
		}
		if(desc.length < 10){
			document.getElementById("error9").innerHTML = "Job Requirement is required";
			return false;
		}
		else{
			document.getElementById("error9").innerHTML = "<img src='images/checkmark2.png' width='20' height='20'>";
			return true;
			
		}
	}
	
	function jobSkills(){
		var skills =  document.getElementById("skills").value;
		if(skills == ""){
			document.getElementById("error3").innerHTML = "Job Skills is required";
			return false;
		}
		if(skills.length < 10){
			document.getElementById("error3").innerHTML = "Job Skills is required";
			return false;
		}
		else{
			document.getElementById("error3").innerHTML = "<img src='images/checkmark2.png' width='20' height='20'>";
			return true;
			
		}
	}		

	function jobCompany(){
		var comp =  document.getElementById("comp_name").value;
		if(comp == ""){
			document.getElementById("error18").innerHTML = "Company name required";
			return false;
		}
		else{
			document.getElementById("error18").innerHTML = "<img src='images/checkmark2.png' width='20' height='20'>";
			return true;
			
		}
	}		

	function jobExp(){
		var min_exp =  document.getElementById("min_exp").value;
		var max_exp =  document.getElementById("max_exp").value;
		
		if(min_exp == "-1" || max_exp == "-1"){
			document.getElementById("error4").innerHTML = "Experience is required";
			return false;
		}
		else{
			document.getElementById("error4").innerHTML = "<img src='images/checkmark2.png' width='20' height='20'>";
			return true;
			
		}
	}		
		
	function jobCity(){
		var loc =  document.getElementById("location").value;
		if(loc == "-1"){
			document.getElementById("error5").innerHTML = "Job City is required";
			return false;
		}
		else{
			document.getElementById("error5").innerHTML = "<img src='images/checkmark2.png' width='20' height='20'>";
			return true;
			
		}
	}		

	function jobotherCity(){
		var city =  document.getElementById("city").value;
		if(city == ""){
			document.getElementById("error5").innerHTML = "Job City is required";
			return false;
		}
		else{
			document.getElementById("error5").innerHTML = "<img src='images/checkmark2.png' width='20' height='20'>";
			return true;
			
		}
	}		

	function jobCountry(){
		var ctry =  document.getElementById("job_ctry").value;
		if(ctry == "-1"){
			document.getElementById("error6").innerHTML = "Job Country required";
			return false;
		}
		else{
			document.getElementById("error6").innerHTML = "<img src='images/checkmark2.png' width='20' height='20'>";
			return true;
			
		}
	}
	
	function jobIndustry(){
		var ind =  document.getElementById("industry").value;
		if(ind == "-1"){
			document.getElementById("error7").innerHTML = "Industry is required";
			return false;
		}
		else{
			document.getElementById("error7").innerHTML = "<img src='images/checkmark2.png' width='20' height='20'>";
			return true;
			
		}
	}		
		

	function jobExpiry(){
		var day = document.getElementById("exp_day").value;
		var month = document.getElementById("exp_month").value;
		var year = document.getElementById("exp_year").value;
		
		if(day == -1){
			document.getElementById("error8").innerHTML = "Day is required";
			return false;
		}
		if(month == -1){
			document.getElementById("error8").innerHTML = "Month is required";
			return false;
		}
		if(year == -1){
			document.getElementById("error8").innerHTML = "Year is required";
			return false;
		}
		else{
			document.getElementById("error8").innerHTML = "<img src='images/checkmark2.png' style='width: 20px; height:20px;'>";
			return true;
		}
	}
	
	function jobQual(){
		var qual =  document.getElementById("qual").value;
		if(qual == ""){
			document.getElementById("error10").innerHTML = "Qualification is required";
			return false;
		}
		else{
			document.getElementById("error10").innerHTML = "<img src='images/checkmark2.png' width='20' height='20'>";
			return true;
			
		}
	}		

	function jobSalary(){
		var min_sal =  document.getElementById("min_salary").value;
		var max_sal =  document.getElementById("max_salary").value;
		
		if(min_sal == "-1" || max_sal == "-1"){
			document.getElementById("error9").innerHTML = "Salary is required";
			return false;
		}
		else{
			document.getElementById("error9").innerHTML = "<img src='images/checkmark2.png' width='20' height='20'>";
			return true;
			
		}
	}		

	function jobVacancies(){
		var vacan =  document.getElementById("vacancies").value;
		if(vacan == ""){
			document.getElementById("error11").innerHTML = "Vacancies is required";
			return false;
		}
		else{
			document.getElementById("error11").innerHTML = "<img src='images/checkmark2.png' width='20' height='20'>";
			return true;
			
		}
	}
	
	 function jobEmployment(){
		var emp_type =  document.getElementById("emp_type").value;
		if(emp_type == "-1"){
			document.getElementById("error12").innerHTML = "Job Type is required";
			return false;
		}
		else{
			document.getElementById("error12").innerHTML = "<img src='images/checkmark2.png' width='20' height='20'>";
			return true;
			
		}
	}		
		
	function jobStatus(){
				
		var status = document.getElementById("emp_status").value;
		if(status == ""){
			document.getElementById("error13").innerHTML = "Status is required";
			return false;
		}
		else{
			document.getElementById("error13").innerHTML = "<img src='images/checkmark2.png' style='width: 20px; height:18px;'>";
			return true;
		}

	}

	function jobEmail(){
		var email = document.getElementById("email").value;
		
		if(email.indexOf("@") == -1){
			document.getElementById("error16").innerHTML = "Invalid e-mail address";
			return false;
		}
		
		if(email == ""){
			document.getElementById("error16").innerHTML = "E-mail address required";
			return false;
		}
		
		else{
			document.getElementById("error16").innerHTML = "<img src='images/checkmark2.png' style='width: 20px; height:20px;'>";
			return true;
		}

	}

	function jobApply(){
				
		var apply = document.getElementById("howapply").value;
		if(apply == ""){
			document.getElementById("error19").innerHTML = "How to Apply required";
			return false;
		}
		else{
			document.getElementById("error19").innerHTML = "<img src='images/checkmark2.png' style='width: 20px; height:18px;'>";
			return true;
		}

	}

	function jobContact(){
				
		var  contact = document.getElementById("comp_addr").value;
		if(contact == ""){
			document.getElementById("error20").innerHTML = "Address is required";
			return false;
		}
		else{
			document.getElementById("error20").innerHTML = "<img src='images/checkmark2.png' style='width: 20px; height:18px;'>";
			return true;
		}

	}

	function jobKeywords(){
				
		var keyword = document.getElementById("keywords").value;
		if(keyword == ""){
			document.getElementById("error17").innerHTML = "Job Keywords required";
			return false;
		}
		else{
			document.getElementById("error17").innerHTML = "<img src='images/checkmark2.png' style='width: 20px; height:18px;'>";
			return true;
		}

	}
	
	function jobimageCheck(){
		var upload = document.getElementById("walk_image").value;
		if(upload == ""){
			document.getElementById("error26").innerHTML = "Select Job Ad";
			return false;
		}
		else{
			document.getElementById("error26").innerHTML = "<img src='images/checkmark2.png' style='width: 20px; height:18px;'>";
			return true;
		}

	}


	function confirmSubmit(){
		
		if(!jobTitle()){
			document.getElementById("error1").innerHTML = "Job title required";
			return false;
		}
		
		if(!jobDesc()){
			document.getElementById("error2").innerHTML = "Description required";
			return false;
		}
		if(!jobSkills()){
			document.getElementById("error3").innerHTML = "Job skills required";
			return false;
		}
		if(!jobExp()){
			document.getElementById("error4").innerHTML = "Experience required";
			return false;
		}
		if(!jobCity()){
			document.getElementById("error5").innerHTML = "Job City required";
			return false;
		}
		if(!jobCountry()){
			document.getElementById("error6").innerHTML = "Country is required";
			return false;
		}
		if(!jobIndustry()){
			document.getElementById("error7").innerHTML = "Industry is required";
			return false;
		}
		if(!jobExpiry()){
			document.getElementById("error8").innerHTML = "Expiry date is required";
			return false;
		}
		if(!jobQual()){
			document.getElementById("error10").innerHTML = "Qualification is required";
			return false;
		}
		if(!jobSalary()){
			document.getElementById("error9").innerHTML = "Salary is required";
			return false;
		}
		if(!jobVacancies()){
			document.getElementById("error11").innerHTML = "Vacancies is required";
			return false;
		}
		if(!jobEmployment()){
			document.getElementById("error12").innerHTML = "Employment is required";
			return false;
		}
		if(!jobStatus()){
			document.getElementById("error13").innerHTML = "Status is required";
			return false;
		}
		if(!jobEmail()){
			document.getElementById("error16").innerHTML = "Email is required";
			return false;
		}
		if(!jobKeywords()){
			document.getElementById("error17").innerHTML = "Keywords is required";
			return false;
		}

		else{
		//	window.alert("Form is successfully submitted...");
			return true;
		}
	}

	function walkinConfirm(){
		
		if(!jobTitle()){
			document.getElementById("error1").innerHTML = "Job title required";
			return false;
		}
		if(!jobCompany()){
			document.getElementById("error18").innerHTML = "Company name required";
			return false;
		}
		if(!jobExpiry()){
			document.getElementById("error8").innerHTML = "Interview date is required";
			return false;
		}
		if(!jobCity()){
			document.getElementById("error5").innerHTML = "Job City required";
			return false;
		}
		if(!jobKeywords()){
			document.getElementById("error17").innerHTML = "Keywords is required";
			return false;
		}

		else{
		//	window.alert("Form is successfully submitted...");
			return true;
		}
	}

	function foreignConfirm(){
		
		if(!jobTitle()){
			document.getElementById("error1").innerHTML = "Job title required";
			return false;
		}
		if(!jobCompany()){
			document.getElementById("error18").innerHTML = "Company name required";
			return false;
		}
		if(!jobCountry()){
			document.getElementById("error6").innerHTML = "Job Country is required";
			return false;
		}
		if(!jobotherCity()){
			document.getElementById("error5").innerHTML = "Job City required";
			return false;
		}
		if(!jobIndustry()){
			document.getElementById("error7").innerHTML = "Category is required";
			return false;
		}
		if(!jobExpiry()){
			document.getElementById("error8").innerHTML = "Interview date is required";
			return false;
		}
		if(!jobEmployment()){
			document.getElementById("error12").innerHTML = "Job Type is required";
			return false;
		}
		if(!jobDesc()){
			document.getElementById("error2").innerHTML = "Job Description is required";
			return false;
		}
		if(!jobRequire()){
			document.getElementById("error9").innerHTML = "Job Requirenebt is required";
			return false;
		}
		if(!jobKeywords()){
			document.getElementById("error17").innerHTML = "Keywords is required";
			return false;
		}

		else{
		//	window.alert("Form is successfully submitted...");
			return true;
		}
	}
