<?php
    include_once 'DBConnection.php';
    session_start();
    $user_id = $_SESSION['user_id'];


$sql_displayValues = "SELECT * FROM user where user_id = '$user_id'";
$result_displayValues = mysqli_query($connection, $sql_displayValues);

$row_displayValues = mysqli_fetch_assoc($result_displayValues);
$email = $row_displayValues['email'];
$password = $row_displayValues['password'];
$phone = $row_displayValues['phone'];
$age = $row_displayValues['age'];
$gender = $row_displayValues['gender'];
$dob = $row_displayValues['dob'];
$profile_pic = $row_displayValues['profilepic_location']; 

 

$error = '';
$success = '';

if(isset($_REQUEST['submit'])){

   
    $email_fetched = $_REQUEST['email'];
    $password_fetched = $_REQUEST['password'];
    $phone_fetched = $_REQUEST['phone'];
    $age_fetched = $_REQUEST['age'];
    $dob_fetched = $_REQUEST['dob'];
    $dateAdded_fetched = date('Y-m-d');

  
    if(!empty($email_fetched) && !empty($password_fetched) && !empty($phone_fetched) && !empty($age_fetched) && !empty($dob_fetched))
    {
        
        $sql_check_isavail = "SELECT * FROM user where user_id = '$user_id'";
        $result_check_isavail = mysqli_query($connection, $sql_check_isavail);

        // var_dump($_FILES['picture']); 
        $fileName = $_FILES['profilepic_location']['name'];
        $tempLocation = $_FILES['profilepic_location']['tmp_name'];
        $newfileName = rand(9999,1000).date('ymdhis').$fileName;  
        move_uploaded_file($tempLocation,'images/'.$newfileName);


    if (mysqli_num_rows($result_check_isavail) == 1) {
        // update query
        $sql_update = "UPDATE user SET profilepic_location='$newfileName',
         email='$email_fetched', password='$password_fetched' , phone='$phone_fetched', age='$age_fetched', dob='$dob_fetched' WHERE user_id='$user_id'";

        if (mysqli_query($connection, $sql_update)) {
          echo "Record updated successfully";

        $sql_displayValues = "SELECT * FROM user where user_id = '$user_id'";
        $result_displayValues = mysqli_query($connection, $sql_displayValues);

        $row_displayValues = mysqli_fetch_assoc($result_displayValues);
        $email = $row_displayValues['email'];
        $password = $row_displayValues['password'];
        $phone = $row_displayValues['phone'];
        $age = $row_displayValues['age'];
        $dob = $row_displayValues['dob'];
        $profile_pic = $row_displayValues['profilepic_location']; 

        } else 
        {
            echo "Error updating record: " . mysqli_error($connection);
        }     
    }else{



        $sql = "INSERT INTO user (profilepic_location, user_id, email, password, age, dob, date_added) 
        VALUES ('$newfileName','$user_id', '$email_fetched', '$password_fetched', '$phone_fetched', '$age_fetched', '$dob_fetched', '$dateAdded_fetched')"; 
                    if (mysqli_query($connection, $sql)) {
                        $success  =  "Profile Created";

                        $sql_displayValues = "SELECT * FROM user where user_id = '$user_id'";
                        $result_displayValues = mysqli_query($connection, $sql_displayValues);

                        $row_displayValues = mysqli_fetch_assoc($result_displayValues);
                        $email = $row_displayValues['email'];
                        $password = $row_displayValues['password'];
                        $phone = $row_displayValues['phone'];
                        $age = $row_displayValues['age'];
                        $dob = $row_displayValues['dob'];
                        $profile_pic = $row_displayValues['profilepic_location']; 

                    } else {
                      $success  =  "Error: " . $sql . "<br>" . mysqli_error($connection);
                    }
        }
    }else{
            $error = 'All fields are compulsory';
        }
}

?>
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Igloo Profile Editor</title>
	<link href="css/Profile.css" rel="stylesheet">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
  <!-- Desktop navbar-->
	<div class="headerMenu nav-topbar"> 
			<div id="wrapper">
			<ul class="nav justify-content-center navbar">
			<li><img src="images/NavLogo.png" alt="TheIglooLogo" class="igloologo"></li>
			<li><a href="Post.php">Post</a></li>
			<li><a href="Friends.php">Friends</a></li>
			<li><a href="Messages.php">Messages</a></li>
			<li><a href="ProfileEditor.php">Profile</a></li>
			</ul>
		</div>
	</div>
  
	<div class="container">
            <form action="profile.php" method='post' enctype='multipart/form-data'>
                <div class="row">
                <div class="col-6">
                <div class="form-group">                    
                        <form action="upload.php" method="post" enctype="multipart/form-data">
                            <p>Select image to upload:</p>
                            <input type="file" name="fileToUpload" id="fileToUpload">
                            <input type="submit" value="Upload Image" name="submit">
                            <?php  ?>
                        </form>
                    </div>
                </div>
                <div class="col-6">
                <?php if(isset($profile_pic)) {?>
                <img src="<?php echo isset($profile_pic) ? "images/". $profile_pic : '' ?>" alt="images/userpfp.png" height=300 width=300><br>
                <?php } ?>
                
                </div>
                </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" name="email" value="<?php echo (isset($email)) ? "$email" : ""?>">
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="text" name="password" value="<?php echo (isset($password)) ? "$password" : ""?>">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="text" name="phone" value="<?php echo (isset($phone)) ? "$phone" : ""?>">
                    </div>
                    <div class="form-group">
                        <label for="age">Age:</label>
                        <input type="text" name="age" value="<?php echo (isset($age)) ? "$age" : ""?>">
                    </div>
                    <div class="form-group">
                        <label for="gender">Select DOB:</label> 
                       <input type="date" name='dob' class='form-control' value='<?php echo (isset($dob)) ? "$dob" : ""?>'>
                    </div>

                  <!-- <input type="text" class="form-control" placeholder="Enter email" name="name" value='<?php echo (isset($name)) ? $name: ''  ?>'> -->

                  <button type="submit" name='submit' class="btn btn-primary">Submit</button>
                </form>
            <br>
            <div style="padding-top: 30px">
                <button id="adminLogin" onclick="runPrompt()">Admin Login</button> 
                <script>
                    function runPrompt(){
                        var pswd = window.prompt("Enter Admin Password: ");
                    if(pswd == "admin")
                    {
                        window.location.href = "AdminPanel.php";
                    }
                    }
                </script>
            </div>
	</div>
	   <!-- Mobile navbar-->
		  <div class="nav-bottombar headerMenu">
			  <ul class="navbar" >
			  <li><a href="Post.php" ><i style="font-size:20px" class="fa">&#xf030;</i></a></li>
			  <li><a href="Friends.php"><i style="font-size:20px" class="fa">&#xf0c0;</i></a></li>
			  <li><a href="Messages.php"><i style="font-size:20px" class="fa">&#xf075;</i></a></li>
			  <li><a href="ProfileEditor.php"><i style="font-size:20px" class="fa">&#xf007;</i></a></li>
			  </ul>
		  </div>
</body>
</html>
