<?php 


	//check for submission
	if (isset($_POST['submit'])) {

		$errors=array();

		//check if username and password has been entered

		if (!isset($_POST['username']) || strlen(trim($_POST['username']))<1) {
			$errors[]='Username is Missing/Invalid';
		}

		if (!isset($_POST['password']) || strlen(trim($_POST['password']))<1) {
			$errors[]='Password is Missing/Invalid';
		}

		//Check if there are any errors in the form
		if (empty($errors)) {
			//save username and password into variables

			$username=mysqli_real_escape_string($conn,$_POST['username']);
			$password=mysqli_real_escape_string($conn,$_POST['password']);
			//$hashed_password=sha1($password);

			//prepare database query
            $p=md5($password);
			$query="SELECT * FROM `user` WHERE `username`='{$username}' AND `password`='{$p}' LIMIT 1 ";
            
			$result_set=mysqli_query($conn,$query);
			if ($result_set) {	
				//query successful
				if (mysqli_num_rows($result_set)==1) {
					
                    //valid user founde
					$user=mysqli_fetch_assoc($result_set);
               
					$_SESSION['user_id']= $user['id'];
					$_SESSION['username']=$user['username'];
					$_SESSION['password']=$user['password'];
                    
					//redirect to index.php
//                    header('./');
                   // echo"hello";
                    header('Location:index.php');
				}
				else{
					//username or password invalid
					$errors[]='Invalid username or password';
				}
			}
			else{
				$errors[]='Database query failed';
                
			}
		}
	}
?>