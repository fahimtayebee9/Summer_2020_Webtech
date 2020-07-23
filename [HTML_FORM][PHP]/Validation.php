<html>
<head>
    <link rel="stylesheet" href="style.css">
	<title>Registration Form</title>
</head>
<body>
	
	<form action="" method="POST" >
	<table  >
			<tr>
				<td class="heading" colspan="3">PERSON PROFILE</td>			
			</tr>
			<tr>
				<td class="title">Name</td>
				<td class="input-area">
				<input type="text"name=" name_entered" value='' class="input-box"/>
				</td>
				<td class="blank-td"></td>
			</tr>
			<tr>
				<td class="title">Email</td>
				<td class="input-area">
					<input type="email" name="email" class="input-box">
				</td>
				<td class="blank-td"></td>
			</tr>
			<tr>
				<td class="title">Gender</td>
				<td class="input-box">
					<input type="radio" name="gender" value="" >  Male 
                    <input type="radio" name="gender" value="" > Female
                    <input type="radio" name="gender" value="" > Other
				</td>
				<td class="blank-td"></td>
            </tr>
            <tr>
				<td class="title">Date of Birth</td>
				<td class="input-area">
					<input class="date-area" type="text" name="day">  /
					<input class="date-area" type="text" name="month">  /
					<input class="date-area" type="text" name="year">  (dd/mm/yyyy)
				</td>
				<td  class="blank-td"></td>
            </tr>
            <tr>
				<td class="title">Blood Group</td>
				<td class="input-area">
					<select name="blood" class="blood-group">
						<option value="">A+</option>
						<option value="">A-</option>
						<option value="">B+</option>
						<option value="">B-</option>
						<option value="">AB+</option>
						<option value="">AB-</option>
						<option value="">O+</option>
						<option value="">O-</option>
                    </select>
				</td>
				<td class="blank-td"></td>
            </tr>
            <tr>
				<td class="title">Degree</td>
				<td class="input-area">
					<input type="checkbox" name="degree_info"/> SSC
					<input type="checkbox" name="degree_info"/> HSC
					<input type="checkbox" name="degree_info"/> BSc.
                    <input type="checkbox" name="degree_info"/> MSc.
				</td>
				<td class="blank-td"></td>
            </tr>
            <tr>
                <td class="title">Photo</td>
                <td class="input-area ">
                    <div class="photo-box">
                        <input type="button" name=' profile_picture' value="Browse.."> 
                        <p>No file selected.</p>
                    </div>
                </td>
                <td class="blank-td"></td>
            </tr>
            <tr>
                <td colspan="3" class="blank"></td>
            </tr>
            <tr>
                <td colspan="3" class="input-area ">
                    <div class="button-area photo-box">
						<input type="submit" name="submitbutton" value="Submit"/>
                        <input type="button" value="Reset">
                    </div>
                </td>
            </tr>
		</table>
		
	</form>

</body>
<?php
	#Name Validation :
	$name= $_POST['name_entered'];
	$email= $_POST['email'];
	#$gender= $_POST['gender'];
	#$day= $_POST['day'];
	#$month= $_POST['month'];
	#$year = $_POST['year'];
	#$degree = $_POST['degree_info'];
	#$blood = $_POST['blood'];
	#$picture = $_POST['profile_picture'];
	$submitbutton= $_POST['submitbutton'];

	if ($submitbutton){
		if (!empty($name) ) {
			if($name >= 'a' && $name <= 'z' || $name >= 'A' && $name <= 'Z' || $name == '-' || $name == '.'){
				exit; #requirement 3 : contains a-z, A-Z, . , -
			}
			else if($name[0] >= 'a' || $name[0] <= 'z' || $name[0] >= 'A' ||$name[0] <= 'Z'){
				exit; #requirement 4 : Starts with a letter
			}
			else if(str_word_count($name) >= 2){
				print "<br>Valid Name.."; #word count
			}
		}
		else {
			echo '<br>INVALID NAME..';
		}
		

		}
		if(!empty($name) && !empty($email)){
			echo "<div> <h1>Informations Inserted</h1></div>";
			echo '<h4>Name : ' . $name . '</h4>';
			echo '<h4>Email : ' . $email . '</h4>';
		}
	}
?>
