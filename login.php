<?php
   session_start();
   
   include("config.php");
   $user;
   $pass;
   $auth=false;
   
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $user = test_input($_POST["username"]);
        $pass = test_input($_POST["password"]);
        $auth=auth($user,$pass);
        if($auth==true)
        {
            $_SESSION["user"]=$user;
            header('Location: '.'index.php');
        }
    }


    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

      function auth($user, $pass)
      {
          $sql = "SELECT pass FROM login WHERE user='$user'";
          global $conn;
          $result= mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)) {
                if($row["pass"]==$pass){
                    mysqli_close($conn);
                    return true;
                }
                else{
                    mysqli_close($conn);
                    return false;
                }
            }
          }          
      }

?>
<html>
   
   <head>
      <title>Login Page</title>
      
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
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>UserName:</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password:</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>
