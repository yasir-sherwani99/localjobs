<!DOCTYPE html>
<head>
	<title>jQuery Test Bench</title>
	<script src="jquery.js"></script>
	<script type="text/javascript">
	
	$(document).ready(function(){
			toggleFields(); //call this first so we start out with the correct visibility depending on the selected form values
    //this will call our toggleFields function every time the selection value of our underAge field changes
    	$("#age").change(function() {
        	toggleFields();
    	});

	});
//this toggles the visibility of our parent permission fields depending on the current selected value of the underAge field
	function toggleFields() {
    	if($("#age").val() >= 14)
        	$("#parentPermission").show();
    	else
        	$("#parentPermission").hide();
	}

	
</script>

</head>

<body><!--
<table id="newmem" cellpadding="4" border="0" style="border-collapse: collapse;">
    <tr>
    <td colspan="3" style="color: #000; font-weight: bold;">Account Information</td>
  </tr> 
  <tr>
    <td align="left" style="color: #00BFFF;">Email</td>
    <td><input type="email" name="m_email" id="email" placeholder="Please register your current email address." /></td>
    <td class="error_mess" id="error"></td>
  </tr>
  <tr>
    <td align="left" style="color: #00BFFF;">Password</td>
    <td><input type="password" name="m_pass" id="m_pass" placeholder="Password" /></td>
    <td class="error_mess" id="error1"></td>
  </tr>
  <tr>
    <td align="left" style="color: #00BFFF;">Confirm Password</td>
    <td><input type="password" name="m_pass1" id="m_pass1" placeholder="Confirm Password" /></td>
    <td class="error_mess" id="error2"></td>
  </tr>
  <tr>
    <td colspan="3"><hr/></td>
  </tr>
  <tr>
    <td colspan="3" style="color: #000; font-weight: bold;">Personal & Contact Details</td>
  </tr>
  <tr>
    <td align="left" style="color: #00BFFF;">First Name</td>
    <td><input type="text" name="f_name" id="f_name" placeholder="Mention your first name" /></td>
    <td class="error_mess" id="error3"></td>
  </tr>
  <tr>
    <td align="left" style="color: #00BFFF;">Last Name</td>
    <td><input type="text" name="l_name" id="l_name" placeholder="Mention your last name" /></td>
    <td class="error_mess" id="error4"></td>
  </tr>
  <tr>
    <td align="left" style="color: #00BFFF;">Do you have work experience?</td>
    <td>
    	<input type="radio" name="experience" id="experience" value="Yes" />&nbsp;Yes
        <input type="radio" name="experience" id="experience" value="No" />&nbsp;No
    </td>
    <td class="error_mess" id="error16"></td>
  </tr>
  <tr id="must_hide">
    <td align="left" style="color: #00BFFF;">Total Experience</td>
    <td>
    	<select name="m_exp_year">
            <option value="">Years</option>
            <option value="fresh">Fresh</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="10+">10+</option>
        </select>
        <select name="m_exp_month">
        	<option value="-1">Months</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
        </select>
	</td>
    <td class="error_mess" id="error17"></td>
  </tr>
  <tr>
  	<td></td>
    <td>
		<input type="submit" name="register" value="Submit Data" />
    </td>
    <td id="loading"></td>
  </tr>
	
</table> -->
<h1>Toggle fields based on form values</h1>
<p>Change the age field and see what happens</p>
<form method="POST">
    <p>Name:
        <input type="text" name="player_name" />
    </p>
    <p>Email:
        <input type="text" name="player_email" />
    </p>
    <p>Age:
        <select id="age" name="age">
            <option value="13">13 or younger</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
        </select>
    </p>
    <div id="parentPermission">
        <p>Parent's Name:
            <input type="text" name="parent_name" />
        </p>
        <p>Parent's Email:
            <input type="text" name="parent_email" />
        </p>
        <p>You must have parental permission before you can play.</p>
    </div>
    <p align="center">
        <input type="submit" value="Join!" />
    </p>
</form>

</body>
</html>