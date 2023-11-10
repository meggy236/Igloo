<?php
    include_once 'DBConnection.php';
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Igloo Private Mesages</title>
	<link href="css/Messages.css" rel="stylesheet">
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
		<ul id="friend-list">
		 <li class="friend">
			<button class="creategroup name" onclick="">Create Group</button>
		    <div class="chat-popup" id="myForm">
 			 <form action="/action_page.php" class="form-container">

				<label for="group"><b>Add friends: </b></label>
				<textarea placeholder="Type Friend Name.." name="group" required></textarea>

				<button type="submit" class="btn">Create</button>
				<button type="button" class="btn cancel" onclick="closeForm()">Close</button>
		  	</form>
		  </div>
		  </li>
		  <li class="friend">
			<img src="https://i.imgur.com/nkN3Mv0.jpg" width="49" height="66">
			<button class="open-button name" onclick="openForm()">John Doe</button>
			  <div class="chat-popup" id="myForm">
 			 <form action="/action_page.php" class="form-container">
   			 <h1>Chat</h1>

			<label for="msg"><b>Message</b></label>
			<textarea placeholder="Type message.." name="msg" required></textarea>

			<button type="submit" class="btn">Send</button>
			<button type="button" class="btn cancel" onclick="closeForm()">Close</button>
		  </form>
		</div>
		  </li>
		  <li class="friend">
			<img src="https://i.imgur.com/0I4lkh9.jpg">
			<button class="open-button name" onclick="openForm()">Loren Grass</button>
			   <div class="chat-popup" id="myForm">
 			 <form action="/action_page.php" class="form-container">
				 <h1>Chat</h1>

				<label for="msg"><b>Message</b></label>
				<textarea placeholder="Type message.." name="msg" required></textarea>

				<button type="submit" class="btn">Send</button>
				<button type="button" class="btn cancel" onclick="closeForm()">Close</button>
		 	 </form>
			  </div>
		  </li>
		  <li class="friend">
			<img src="https://i.imgur.com/s2WCwH2.jpg">
			<button class="open-button name" onclick="openForm()">TyeTye Lite</button>
			   <div class="chat-popup" id="myForm">
 			 <form action="/action_page.php" class="form-container">
				 <h1>Chat</h1>

				<label for="msg"><b>Message</b></label>
				<textarea placeholder="Type message.." name="msg" required></textarea>

				<button type="submit" class="btn">Send</button>
				<button type="button" class="btn cancel" onclick="closeForm()">Close</button>
		  	</form>
		  </div>
		  </li>
		  <li class="friend">
			<img src="https://i.imgur.com/rxBwsBB.jpg">
			<button class="open-button name" onclick="openForm()">Jessica Luke</button>
			 <div class="chat-popup" id="myForm">
 			 <form action="/action_page.php" class="form-container">
				 <h1>Chat</h1>

				<label for="msg"><b>Message</b></label>
				<textarea placeholder="Type message.." name="msg" required></textarea>

				<button type="submit" class="btn">Send</button>
				<button type="button" class="btn cancel" onclick="closeForm()">Close</button>
		  	</form>
		  </div>
		  </li>
		  <li class="friend">
			<img src="https://i.imgur.com/tovkOg2.jpg">
			<button class="open-button name" onclick="openForm()">Sally Hansen</button>
		    <div class="chat-popup" id="myForm">
 			 <form action="/action_page.php" class="form-container">
				 <h1>Chat</h1>

				<label for="msg"><b>Message</b></label>
				<textarea placeholder="Type message.." name="msg" required></textarea>

				<button type="submit" class="btn">Send</button>
				<button type="button" class="btn cancel" onclick="closeForm()">Close</button>
		  	</form>
		  </div>
		  </li>
		  <li class="friend">
			<img src="https://i.imgur.com/A7lNstm.jpg">
			<button class="open-button name" onclick="openForm()">George Shrinks</button>
		    <div class="chat-popup" id="myForm">
 			 <form action="/action_page.php" class="form-container">
				 <h1>Chat</h1>

				<label for="msg"><b>Message</b></label>
				<textarea placeholder="Type message.." name="msg" required></textarea>

				<button type="submit" class="btn">Send</button>
				<button type="button" class="btn cancel" onclick="closeForm()">Close</button>
		  	</form>
		  </div>
		  </li>
		</ul>
		
	</div>
	   <!-- Mobile navbar-->
		  <div class="nav-bottombar headerMenu">
			  <ul class="navbar" >
			  <li><a href="Post.html" ><i style="font-size:20px" class="fa">&#xf030;</i></a></li>
			  <li><a href="Friends.html"><i style="font-size:20px" class="fa">&#xf0c0;</i></a></li>
			  <li><a href="Messages.html"><i style="font-size:20px" class="fa">&#xf075;</i></a></li>
			  <li><a href="ProfileEditor.html"><i style="font-size:20px" class="fa">&#xf007;</i></a></li>
			  </ul>
		  </div>
</body>
</html>
