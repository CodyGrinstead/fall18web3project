<?php
    session_start();

    include "config.php";
    $filename;
    $user=$_SESSION["user"];
    $filelocation;
    global $conn;

    if(!isset($_SESSION["user"])){
        echo "<h1>You need to be logged in to upload photos</h1>";
        echo "<h1>click <a href='login.php'> here </a> to login</h1>";
    }

    if(isset($_FILES['image'])){
        $errors= array();
        $file_name = $_FILES['filename']['name'];
        $file_size = $_FILES['filename']['size'];
        $file_tmp = $_FILES['filename']['tmp_name'];
        $file_type = $_FILES['filename']['type'];
        $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $filename=$_POST["filename"];
        $filelocation = "/photos/$filename";
        $sql = "INSERT INTO photos (Name, location, user) VALUES ('$filename','$filelocation','$user')";
        if (mysqli_query($conn, $sql)) {
            mysqli_close($conn);
            if (move_uploaded_file($_FILES['filename']['tmp_name'],$filename)){
                echo "it worked";
            }
            else{
                echo "nope";
            } 
        } else {
            mysqli_close($conn);
        }
    }






echo "<h1>Hello $user</h1>";
    $form = <<<FORM
    <form action="upload.php" method="post" enctype=Multipart/form-data">
    Select image to upload:
    <input type="file" name="filename" id="filename">
    <input type="submit" value = "Upload Image" name="submit">
    </form>
FORM;


echo $form;
?>
