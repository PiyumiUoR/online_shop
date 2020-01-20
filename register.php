<?php

//function validate_user_registration(){
//$errors = [];
//
//	$min = 3;
//	$max = 20;
//
//if($_SERVER['REQUEST_METHOD'] == "POST") {
//global $post;
//
//
//    $username = $post['username'];
//    $email = $post['email'];
//    $password = $post['password'];
//    $confirm_password = $post['confirm_password'];
//
//
//
//
//		if(strlen($username) < $min) {
//
//			$errors[] = "Your username cannot be less than {$min} characters";
//
//		}
//
//		if(strlen($username) > $max) {
//
//			$errors[] = "Your username cannot be more than {$max} characters";
//
//		}
//
//        	if(strlen($password) < 7) {
//
//			$errors[] = "Use 8 characters or more for password";
//
//		}
//
//		if(email_exists($email)){
//
//			$errors[] = "Sorry that email already is registered";
//
//		}
//        			if(email_validate($email)){
//
//			$errors[] = "Your email does not match valid email format";
//
//		}
//         if($password !== $confirm_password) {
//
//			$errors[] = "Your password fields do not match";
//
//         }
//}
//
//}

//check for submission
	if (isset($_POST['register'])) {

		$errors=array();

		//check if username and password has been entered

		if (!isset($_POST['username']) || strlen(trim($_POST['username']))<1) {
			$errors[]='Username is Missing/Invalid';
		}

		if (!isset($_POST['password']) || strlen(trim($_POST['password']))<1) {
			$errors[]='Password is Missing/Invalid';
		}
        if (!isset($_POST['email']) || strlen(trim($_POST['email']))<1) {
			$errors[]='email is Missing/Invalid';
		}
        if (!isset($_POST['confirm_password']) || strlen(trim($_POST['confirm_password']))<1) {
			$errors[]='confirmation is Missing/Invalid';
		}
        
         

		//Check if there are any errors in the form
		if (empty($errors)) {
			//save username and password into variables

			$username=mysqli_real_escape_string($conn,$_POST['username']);
            $email=mysqli_real_escape_string($conn,$_POST['email']);
			$password=mysqli_real_escape_string($conn,$_POST['password']);
            $confirm_password=mysqli_real_escape_string($conn,$_POST['confirm_password']);
              if ($password !=  $confirm_password) {
			         echo 'confirmation is wrong';
		          } else{
                        $password=md5($password);
        

			$query="INSERT INTO `user`(`username`, `email`, `password`) VALUES ( '$username','$email','$password')";
            $result = mysqli_query($conn,$query) ; 
            
//             header('Location:index.php');   
            }
		}
	}
?>