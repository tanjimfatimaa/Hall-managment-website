<?php
require_once 'core/init.php';

if(!$username = Input::get('user')) {
  Redirect::to('index.php');


} 

if (isset($_POST['submit'])) {
    $user_id=$_SESSION['id'];

    $validextensions = array("jpeg", "jpg", "png");
    $temporary = explode(".", $_FILES["file"]["name"]);
    $file_extension = end($temporary);

    if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
            ) && ($_FILES["file"]["size"] < 100000000000000000)//Approx. 100kb files can be uploaded.
            && in_array($file_extension, $validextensions)) {

        if ($_FILES["file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
        } else {
            
           // echo "<span>Your File Uploaded Succesfully...!!</span><br/>";
           // echo "<br/><b>File Name:</b> " . $_FILES["file"]["name"] . "<br>";
           // echo "<b>Type:</b> " . $_FILES["file"]["type"] . "<br>";
           // echo "<b>Size:</b> " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
           // echo "<b>Temp file:</b> " . $_FILES["file"]["tmp_name"] . "<br>";


            if (file_exists("upload/" . $_FILES["file"]["name"])) {
                echo $_FILES["file"]["name"] . " <b>already exists.</b> ";
            } else {
                move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . time() . $_FILES["file"]["name"]);
                //echo "<b>Stored in:</b> " . "upload/" . $_FILES["file"]["name"];
            }
        
        }
    } else {
        echo "<span>***Invalid file Size or Type***<span>";
    }
    $link1 ="upload/" . time() . $_FILES["file"]["name"];

    $sql="UPDATE users SET about ='hello world' WHERE id='$user_id';";
    mysql_query($sql);


}


?>



