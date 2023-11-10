<?php
    include_once 'DBConnection.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Igloo Upload</title>
	<link href="css/Post.css" rel="stylesheet">
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
		<form>
		<div class="tweet-body"> 
			<form method="post" enctype="multipart/form-data">
			<img src="images/userpfp.png" alt="User Profile Pic" class="usrpfp" name="profilepic_location">
			<h2>&nbsp;&nbsp;&nbsp; Megan</h2>
                        <?php ?>
			<textarea class="status center cmsg" name="text" placeholder="Write your post here!" rows="4" cols="50"></textarea> 
			<p align="right"><button type="submit" class="submitpost">post</button></p>
			</form>
                        <-! I tried so hard with the post page and could not get it to work. I was using help from: https://code-boxx.com/simple-php-comment-system/ -->
                        <script>
                        var comments = {
                        // (A) AJAX HELPER FUNCTION
                        ajax : function (data, after) {
                          // (A1) DATA
                          var fdata = new FormData();
                          for (let k in data) { fdata.append(k, data[k]); }
                          fdata.append("pid", document.getElementById("pid").value);

                          // (A2) AJAX REQUEST
                          var xhr = new XMLHttpRequest();
                          xhr.open('POST', "comments.php");
                          xhr.onload = after;
                          xhr.send(fdata);
                        },

                        // (B) LOAD COMMENTS
                        load : function () {
                          comments.ajax(
                            // (B1) DATA TO SEND
                            { req: "show" }, 

                            // (B2) PUT SERVER RESPONSE INTO COMMENTS WRAPPER
                            function(){
                              document.getElementById("commentbox").innerHTML = this.response;
                            }
                          );
                        },

                        // (C) ADD COMMENT
                        add: function () {
                          comments.ajax(
                            // (C1) DATA TO SEND
                            {
                              req : "add",
                              msg : document.getElementById("cmsg").value
                            },

                            // (C2) RELOAD COMMENTS AFTER ADD
                            function(){
                              if (this.response == "OK") {
                                document.getElementById("cadd").reset();
                                comments.load();
                              } else {
                                alert(this.response);
                              }
                            }
                          );
                          return false;
                        }
                        };
                        window.addEventListener("DOMContentLoaded", comments.load);</script>
                        <h1>COMMENTS</h1>
                        <div id="commentbox">
                            
                        
                        </div>
		</div> 
		</form>
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