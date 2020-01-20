<?php //include('include/home/header.php');?>
<?php //session_start(); ?>
<?php require_once('connection.php'); ?>
<?php require_once('checkLogin.php'); ?>
<?php require_once('register.php'); ?>

<!DOCKTYPE html>
<html>
<head>
<title> Smartics Login page</title>
  <link rel="stylesheet" type="text/css" href="style.css">    

</head>
    <body>
        
        <div id="topbar" >
            <table role="presentation" >
            <tbody>
                <tr>
                    <br>
                <td class="html7magic">
                    <label for="username">Username</label>
                    </td>
                <td class="html7magic">
                    <label for="password">Password</label>
                    </td>    
                </tr>       
            <tr>
                <form action="login.php" method="post">
                 <?php 
				        if (isset($errors) && !empty($errors)) {
					    echo '<p class="errors"> Invalid username/password </p>'; 
				        }
			         ?>
                <td>
                <input id="username" type="username" name="username" />
                </td>
                <td>
                <input id="password" type="password" name="password" />
                </td>
                <td>
                <button type="submit" name="submit"  class="button">Log in</button>
                </td>
                </form>
<!--                <a href="#"></a>-->
                </tr>    
                </tbody>
            </table>
              
        </div>
    <div id="login-box">
      <div class="left-box">

        <form action="login.php" method="POST">
      <h1> Sign Up</h1>
          
          <input type="text" name="username" placeholder="Username"/>
          <input type="text" name="email" placeholder="Email"/>
          <input type="password" name="password" placeholder="Password"/>
          <input type="password" name="confirm_password" placeholder="Confirm Password"/>

            <input type="submit" name="register" value="Sign Up"/></form>
          <a href="#"></a>
      </div>  
        <div class="right-box">
        <span class="signwith"> Sign in with<br/>Social Network</span>
        <button class="social facebook">Log in with Facebook</button>
        <button class="social twitter">Log in with Twitter</button>
        <button class="social google">Log in with Google+</button>
            
        </div>
        <div class="or">OR</div>
    </div>
        
    </body>
</html>
<?php include('include/home/footer.php'); ?>                   