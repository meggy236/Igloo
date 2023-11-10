<?php
    include_once('DBConnection.php');  
    session_start();
    error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Friends List</title>
	<link href="css/Friends.css" rel="stylesheet">
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
	    <div>
			<ul class="flex-container">
                        <div class="row">
                        <div class="col-4">
                        <h3 class='pb-3' style="color: white">Friends List</h3>
                        
                        <!-- I had trouble with my error trouble shooting so I gave up but I tried to use this youtuber "UI MONK " to assist me with how to work it. I also tried to use his messaging system but as I couldnt get it to fully work.  -->
                        
                        <?php

                          $users_id = $_SESSION['member_id'];
                          $sql_friendsList_get = "SELECT * FROM friends where user1 = '$users_id' or user2 = '$users_id'";

                          $result_friensList_get = mysqli_query($connection, $sql_friendsList_get);   

                          while($row_friensList_get = mysqli_fetch_assoc($result_friensList_get)) {
                         $myFriend = $row_friensList_get['user1'];
                        // fetch name
                        $sql_getName = "SELECT * FROM user where user_id = '$myFriend'";
                        $result_getName = mysqli_query($connection, $sql_getName);   
                         $row_getName = mysqli_fetch_assoc($result_getName); 
                        //  fetch proflle pic
                        $sql_ProfilePic = "SELECT * FROM user where user_id = '$myFriend'";
                        $result_ProfilePic = mysqli_query($connection, $sql_ProfilePic);   
                         $row_ProfilePic = mysqli_fetch_assoc($result_ProfilePic);
                        // echo $row_ProfilePic['profile_pic'];
                        // echo $row_getName['name'];

                        ?>

                        <div class="row">
                        <div class="col-4">
                        <img src="images/<?php echo $row_ProfilePic['profilepic_location']?>" alt="" height=50 width=50>
                        </div>
                        <div class="col-4">
                        <h6 class='text-uppercase'><?php echo $row_getName['name']; ?></h6>
                        </div>
                        </div>

                        <?php
                          }



                        ?>
                        </div>
                        <div class="col-8">
                        <h3 class='pb-3' style="color: white">Friend Requests:</h3>

                        <?php
                          $user_id = $_SESSION['member_id']; 
                          $sql_Noti = "SELECT * FROM notifications where noti_To = '$user_id'";


                          $result_noti = mysqli_query($connection, $sql_Noti);   





                          while($row_noti = mysqli_fetch_assoc($result_noti)) {
                             $noti_From = $row_noti['noti_From'];
                             $noti_To = $row_noti['noti_To'];
                            $sql_FriendsList = "SELECT * FROM friends where user1 = '$noti_From' and user2 = '$noti_To' or  user1 = '$noti_To' and user2 = '$noti_From'";

                              $result_FriendsList = mysqli_query($connection, $sql_FriendsList);   

                              if (mysqli_num_rows($result_FriendsList) > 0) {

                              }else{

                              ?>


                            <!-- -->
                            <div class="card">
                            <div class="card-body">

                        <div class="alert alert-success d-flex justify-content-between">
                          <strong><?php  echo $row_noti['message']; ?></strong>  
                        </div>
                            </div>
                            </div>


                        <?php
                        }


                         }  



                        ?>

                        </div>
                        </div>

                        <script>
                        $('.btnAccept').click(function(){
                          type = $(this).attr('data-type');
                          reqsendingfrom = $(this).attr('data-reqsendingfrom');
                           button= $(this);
                        $.post(`action.php?action=RequestSection&sentRequest=${reqsendingfrom}&type=${type}`,function(res){
                          alert(res);
                            if(res === 'success_accepted'){
                            console.log(button.parent());

                            button.parent().parent().text('You accepted the friend request from '+reqsendingfrom);
                            } 
                        });
                        });

                        $('.btnReject').click(function(){
                          type = $(this).attr('data-type');
                          reqsendingfrom = $(this).attr('data-reqsendingfrom');
                           button= $(this);
                        $.post(`action.php?action=RequestSection&sentRequest=${reqsendingfrom}&type=${type}`,function(res){
                          alert(res);
                            if(res === 'success_Reject'){
                            console.log(button.parent());

                            button.parent().parent().text('You Rejected the friend request from ' + reqsendingfrom);
                            } 
                        });
                        });




                        </script>	  
                            
			</ul>
		</div>
		<div class="spacer">
	  	<p></p>
	    </div>
		
	    <!-- Mobile navbar-->
  <div class="nav-bottombar headerMenu">
			  <ul class="navbar" margin="auto">
			  <li><a href="Post.php" ><i style="font-size:20px" class="fa">&#xf030;</i></a></li>
			  <li><a href="Friends.php"><i style="font-size:20px" class="fa">&#xf0c0;</i></a></li>
			  <li><a href="Messages.php"><i style="font-size:20px" class="fa">&#xf075;</i></a></li>
			  <li><a href="index.php"><i style="font-size:20px" class="fa">&#xf090;</i></a></li>
			  </ul>
		  </div>
  </body>
</html>