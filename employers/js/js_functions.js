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

	function otherjobCity(){
		var ocity =  document.getElementById("other_city").value;
		if(ocity == ""){
			document.getElementById("error20").innerHTML = "Job City is required";
			return false;
		}
		else{
			document.getElementById("error20").innerHTML = "<img src='images/checkmark2.png' width='20' height='20'>";
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
			document.getElementById("error12").innerHTML = "Employment is required";
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


	function confirmSubmit(){
		
		var title =  document.getElementById("title").value;
		var desc =  document.getElementById("desc").value;
		var skills =  document.getElementById("skills").value;
		var min_exp =  document.getElementById("min_exp").value;
		var max_exp =  document.getElementById("max_exp").value;
		var ctry =  document.getElementById("job_ctry").value;
		var loc =  document.getElementById("location").value;
		var ocity =  document.getElementById("other_city").value;
		var ind =  document.getElementById("industry").value;
		var qual =  document.getElementById("qual").value;
		var min_sal =  document.getElementById("min_salary").value;
		var max_sal =  document.getElementById("max_salary").value;
		var vacan =  document.getElementById("vacancies").value;
		var emp_type =  document.getElementById("emp_type").value;
		var status = document.getElementById("emp_status").value;
		var keyword = document.getElementById("keywords").value;
			
		if(title == ""){
			document.getElementById("error1").innerHTML = "Job Title is required";
			return false;
		}
		
		if(desc == ""){
			document.getElementById("error2").innerHTML = "Job Description is required";
			return false;
		}
		
		if(skills == ""){
			document.getElementById("error3").innerHTML = "Job Skills is required";
			return false;
		}
		
		if(min_exp == "-1" || max_exp == "-1"){
			document.getElementById("error4").innerHTML = "Experience is required";
			return false;
		}
		
		if(ctry == "-1"){
			document.getElementById("error6").innerHTML = "Job Country required";
			return false;
		}
		
		if(ctry == "1" && loc == "-1"){
			document.getElementById("error5").innerHTML = "Job City is required";
			return false;
		}
		
		if(ctry != "1" && ocity == ""){
			document.getElementById("error20").innerHTML = "Job City is required";
			return false;
		}
	
		if(ind == "-1"){
			document.getElementById("error7").innerHTML = "Industry is required";
			return false;
		}
		
		if(qual == ""){
			document.getElementById("error10").innerHTML = "Qualification is required";
			return false;
		}
		
		if(min_sal == "-1" || max_sal == "-1"){
			document.getElementById("error9").innerHTML = "Salary is required";
			return false;
		}
		
		if(vacan == ""){
			document.getElementById("error11").innerHTML = "Vacancies is required";
			return false;
		}
		
		if(emp_type == "-1"){
			document.getElementById("error12").innerHTML = "Employment is required";
			return false;
		}
		
		if(status == ""){
			document.getElementById("error13").innerHTML = "Status is required";
			return false;
		}
		
		if(keyword == ""){
			document.getElementById("error17").innerHTML = "Job Keywords required";
			return false;
		}
		else{
			return true;
		}
	}
	
	
		
		
