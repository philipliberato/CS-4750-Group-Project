<?php
session_start(); // Starting Session
$error = ''; // Variable To Store Error Message

if (isset($_POST['submit'])) {
	if (empty($_POST['username']) || empty($_POST['password'])) {
	
	//user didn't even fill out fields
	$error = "Username or Password is empty";
		
	}
	else {
		//user at least filled out form
		
		$username   = $_POST['username'];
        $password   = $_POST['password'];
        
        $connection = mysqli_connect("stardock.cs.virginia.edu", "cs4750pnl8zp", "hospital", "cs4750pnl8zp");
        
		//for security
        $username   = stripslashes($username);
        $password   = stripslashes($password);
        $username   = mysqli_real_escape_string($connection, $username);
        $password   = mysqli_real_escape_string($connection, $password);   

        $query      = mysqli_query($connection, "select * from User where password='$password' and username='$username'");
		$q_info = mysqli_fetch_row($query);
        $rows       = mysqli_num_rows($query);

        
		if ($rows == 1) {
			//user is at least correct logging in
			$_SESSION['login_user'] = $username;
	        $uid = $q_info[1];
			$_SESSION['usid'] = $uid;
			$emp_chk = mysqli_query($connection, "select * from Employee where userid='$uid'");
			$e_info = mysqli_fetch_row($emp_chk);
			$emp_row = mysqli_num_rows($emp_chk);
			 
			if ($emp_row == 1) {
				//user is either an employee or admin
				$admin_chk = $e_info[0];
		   		$admin_query = mysqli_query($connection, "select * from Administrator where employeeid='$admin_chk'");
		   		$a_row = mysqli_num_rows($admin_query);
				
				if ($a_row == 1) {
					//we found an admin!
					$_SESSION['acct_type'] = 1;
					// header("location: adminwelcome.php");
					header("location: welcome.php");
					exit;
				}
				else {
					$eid = $e_info[0];

					// doctor
					$doctor_chk = mysqli_query($connection, "select * from Doctor where EmployeeID='$eid'");
		   			$is_d = mysqli_num_rows($doctor_chk);

					// nurse
					$nurse_chk = mysqli_query($connection, "select * from Nurse where EmployeeID='$eid'");
		   			$is_n = mysqli_num_rows($nurse_chk);

					// pharmacist
					$pharmacist_chk = mysqli_query($connection, "select * from Pharmacist where EmployeeID='$eid'");
		   			$is_p = mysqli_num_rows($pharmacist_chk);

					// receptionist
					$receptionist_chk = mysqli_query($connection, "select * from Receptionist where EmployeeID='$eid'");
		   			$is_r = mysqli_num_rows($receptionist_chk);

					if($is_d == 1) {
					     $_SESSION['acct_type'] = 2;
					} elseif($is_n == 1) {
					     $_SESSION['acct_type'] = 3;
					} elseif($is_p == 1) {
					     $_SESSION['acct_type'] = 4;
					} elseif($is_r == 1) {
					     $_SESSION['acct_type'] = 5;
					} else {
					     $_SESSION['acct_type'] = 0;
					}

					header("location: welcome.php");
	   			 	exit;
				}
			}
			else {
				//user is just a regular user
				// patient
				$_SESSION['acct_type'] = 6;	
				header("location: welcome.php"); 
				exit; 
			}
		} 
		else {
			//user put in invalid credentials
			$error = "Username or Password is invalid."; 
		}

		mysqli_close($connection);
	}
	
}
?>
