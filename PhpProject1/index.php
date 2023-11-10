<?php include_once('DBConnection.php'); 
?>
<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Igloo Signup/Signin</title>
	<link href="css/index.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap -->
	
	
  </head>
  <body>
	  <!-- Desktop navbar-->
	<div class="headerMenu nav-topbar"> 
			<div id="wrapper">
			<ul class="nav justify-content-center navbar">
			<li><img src="images/NavLogo.png" alt="TheIglooLogo" class="igloologo"></li>
			<li><a href="index.php">Post</a></li>
			<li><a href="index.php">Friends</a></li>
			<li><a href="index.php">Messages</a></li>
			<li><a href="index.php">Sign in/ Sign up</a></li>
			</ul>
		</div>
	</div>
                 <div class="container" id="form">
			<form action="login.php" method="POST">
				
					  <h1 id="Signintxt">Sign In</h1>
					  <hr>
					  <label for="email"><b>Email</b></label>
					  <input type="text" placeholder="Enter Email" name="email">

					  <label for="psw"><b>Password</b></label>
					  <input type="password" placeholder="Enter Password" name="psw">


					  <label>
						<input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
      				  </label>
						 <div class="clearfix">
							<button type="submit" class="signupbtn">Sign In</button>
						 </div>
		        </form>
                      <button onclick="document.getElementById('id01').style.display='block'" class="createaccbtn">Create New Account</button>
                </div>
                <div id="id01" class="modal">
  				<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>

				<form  id="form2" class="modal-content" action="action_form.php" method="post">
   					<div class="container">
					  <h1>Sign Up</h1>
					  <p>Please fill in this form to create an account.</p>
					  <hr>
						
					  <label for="usrsname"><b>Name</b></label>
					  <input type="text" placeholder="Enter Name" name="name" title="Enter your Name" required>
						
					  <label for="email"><b>Email</b></label>
					  <input type="text" placeholder="Enter Email" name="email" title="Enter your Email">

					  <label for="psw"><b>Password</b></label>
					  <input type="password" placeholder="Enter Password" name="password" title="Enter a Password" required>

					  <label for="phonenum"><b>Phone Number</b></label>
					  <input type="telephone" name="phone" placeholder="123-456-7890" title="Enter your Phone Number" required pattern="\d{3}-\d{3}-\d{4}" >
					  
					  <label for="DoB"><b>Date of Birth</b></label>
					  <input type="date" placeholder="YYYY-MM-DD" name="dateofbirth" required>
						
					  <label for="usrage"><b>Age</b></label>
					  <input type="text" id="age" placeholder="Enter Age" name="age" required>
						
     				          <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

						 <div class="clearfix">
							<button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
							<button type="submit" value="Submit" class="signupbtn">Sign Up</button>
						 </div>
   				   </div>
 			   </form>
			</div>
	<script>
		// Get the modal
		var modal = document.getElementById('id01');

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
		  if (event.target == modal) {
			modal.style.display = "none";
		  }
		}
	</script>
	    <!-- Mobile navbar-->
		  <div class="nav-bottombar headerMenu">
			  <ul class="navbar nav-center" margin="auto">
			  <li><a href="index.php" ><i style="font-size:20px" class="fa">&#xf030;</i></a></li>
			  <li><a href="index.php"><i style="font-size:20px" class="fa">&#xf0c0;</i></a></li>
			  <li><a href="index.php"><i style="font-size:20px" class="fa">&#xf075;</i></a></li>
			  <li><a href="index.php"><i style="font-size:20px" class="fa">&#xf090;</i></a></li>
			  </ul>
		  </div>
  </body>
</html>