
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
				<input type="text" name="name_inout" value='' class="input-box"/>
				</td>
				<td class="blank-td"></td>
			</tr>
			<tr>
				<td class="title">Email</td>
				<td class="input-area">
					<input type="email" name="email_inout" class="input-box">
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
						<input type="submit" name="submit_btn" value="Submit"/>
                        <input type="button" value="Reset">
                    </div>
                </td>
            </tr>
		</table>
		
	</form>

</body>
<?php
	$name_field= $_POST['name_inout'];
	$email_field= $_POST['email_inout'];
	#$gender= $_POST['gender'];
	#$day= $_POST['day'];
	#$month= $_POST['month'];
	#$year = $_POST['year'];
	#$degree = $_POST['degree_info'];
	#$blood = $_POST['blood'];
	#$picture = $_POST['profile_picture'];
	$submitbutton = $_POST['submit_btn'];

	echo "<h1>Informations Inserted</h1>";
	if ($submitbutton){
        $validName = name_validation($name_field);
        $validEmail = email_validation($email_field);
		if($validName == 1 && $validEmail == 1){
            echo '<h4>Name : ' . $name_field . '</h4>';
            echo '<h4>Email : ' . $email_field . '</h4>';
        }
        else{
			echo '<br>INVALID DATA..';
		}
	}
	function name_validation($name_field){
        $req = 0;
		if (!empty($name_field) ) {
			if($name_field >= 'a' && $name_field <= 'z' || $name_field >= 'A' && $name_field <= 'Z' || $name_field == '-' || $name_field == '.'){
				$req +=1;
			}
			if($name_field[0] >= 'a' || $name_field[0] <= 'z' || $name_field[0] >= 'A' ||$name_field[0] <= 'Z'){
				$req +=1;
			}
			if(str_word_count($name_field) >= 2){
				$req +=1;
			}
		}
		if($req == 3){
            return 1;
        }
        else{
            return -1;
        }
    }
    
    function email_validation($email_field){
        if(!empty($email_field) && filter_var($email_field, FILTER_VALIDATE_EMAIL)){
            return 1;
        }
        else{
            return -1;
        }
    }
?>
