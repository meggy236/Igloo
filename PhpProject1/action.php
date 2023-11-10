<?php include('DBConnection.php');

session_start();

if($_REQUEST['action'] === 'sendReq')
{
	$reqSendingTo = $_REQUEST['user_id'];
	$reqSendingFrom = $_REQUEST['member_id'];
	
	$sql = "INSERT INTO requests (sendingfrom, sendingto) VALUES ('$reqSendingFrom', '$reqSendingTo')";
	
	$sql_requestFrom_name = "SELECT name FROM requests where user_id = '$reqSendingFrom'";
	$sql_requestTo_name = "SELECT name FROM requests where user_id = '$reqSendingTo'";
	
	$result_FROM = mysqli_query($connection, $sql_requestFrom_name);
	$result_TO = mysqli_query($connection, $sql_requestTo_name);
	
	$row_name_from = mysqli_fetch_assoc($result_FROM);
	$row_name_to = mysqli_fetch_assoc($result_TO);
	
	$message = $row_name_from['name'] . `Sent you a Request
	<button id="confirm" class="btn btn-primary btnAccept" data-type="1" data-reqSendingFrom="'.$reqSendingFrom.'" onclick= "reqAction(1, ` .$reqSendingFrom. `)">Accept</button>
	<button id="delete"  class="btn btn-success btnReject" data-type="2" data-reqSendingFrom="'.$reqSendingFrom.'" onclick= "reqAction(2, ` .$reqSendingFrom. `)"> Reject</button>`;
	
	
	$sql_notification = "INSERT INTO notifications (noti_From, noti_To, message,is_read ) VALUES ('$reqSendingFrom', '$reqSendingTo', '$message' , '0')";
	
	if(mysqli_query($connection, $sql) && mysqli_query($connection, $sql_notification))
	{
		$success = "Friend request sent successfully";
	}else{
		$success = "Error" . $sql . "<br>" . mysqli_error($connection);
	}
	echo $success;
	
}

else if($_REQUEST['action']==='RequestSection'){
	
	$sendRequest = $_REQUEST['sendRequest'];
	
	//$sql_check = "SELECT * FROM user where user_id = '$sendRequest'";
	//$result_check = mysqli_query($connection, $sql_check);
	
		//$row_check = mysqli_fetch_assoc($result_check);
	
	
	
	
	$type = $_REQUEST['type'];
	if($type == 1){
		
		$sql_acceptReq = "UPDATE requests SET accepted='1' WHERE sendingfrom='$sendRequest'";
		
		$MyId = $_SESSION['member_id'];
		$sql_insert_friends = "INSERT INTO friends (user1, user2) VALUES ('$sendRequest', '$MyId')";
		
		
		
		
		
		
		
		if(mysqli_query($connection, $sql_acceptReq) and mysqli_query($connection, $sql_insert_friends)){
			echo "Friend Request Accepted";
		}else{
			echo "Error Accepting.." . mysqli_error($connection);
		}
		
	}
	else if($type == 2){
		
		$sql_rejectReq = "UPDATE requests SET accepted='2' WHERE sendingfrom='$sendRequest'";
		
		if(mysqli_query($connection, $sql_rejectReq)){
			echo "Friend Request Rejected";
		}else{
			echo "Error Accepting.." . mysqli_error($connection);
		}
		
	}
	
}


