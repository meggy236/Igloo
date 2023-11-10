<!doctype html>
<html>
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>
	<link href="css/admin.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap -->
	
	
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
		<div class="row">
		  <div class="column" >
			<h2>Post Statistics</h2>
			<p>Post Likes:</p>
			<p>Post Shares:</p>
		  </div>
		  <div class="column">
			<h2>Network Statistics</h2>
			<p>User's statistics:</p>
			  <p>This user has 10 friends</p>
		  </div>
		  <div class="column">
			<h2>Banned Users</h2>
			<p>hacker1234</p>
			<p>Jane4doe</p>
		  </div>
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
