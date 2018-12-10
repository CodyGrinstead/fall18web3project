<?php
session_start();
include("config.php");
$user=$_SESSION["user"];
$pass;
$email;
if(isset($_SESSION["user"])){
    header('Location: '.'index.php');
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $user = test_input($_POST["username"]);
    $pass = test_input($_POST["password"]);
    $email= test_input($_POST["email"]);
    $reg=false;
    $reg=set_user($user,$pass);
    if($reg==true){

        header('Location: '.'login.php');
    }


}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

function set_user($user,$pass)
{
    $sql = "INSERT INTO login (user,pass) VALUES ('$user', '$pass')";
    global $conn;
    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        return true;
    } else {
        mysqli_close($conn);
        false;
    }
    
}



?>


<html>
   
   <head>
      <title>Register Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Register</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>UserName:</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password:</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <label>Email:</label><input type = "email" name= "email" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>