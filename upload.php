<?php
require_once 'core/init.php';

$user = new User();

if(!$user->isLoggedin()) {
  Redirect::to('index.php');
}

$link1 = '';

//var_dump(Input::exists()) ;
if (isset($_POST['submit'])) {
  

    $validextensions = array("jpeg", "jpg", "png");
    $temporary = explode(".", $_FILES["file"]["name"]);
    $file_extension = end($temporary);

    if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
            ) && ($_FILES["file"]["size"] < 100000000000000000)//Approx. 100kb files can be uploaded.
            && in_array($file_extension, $validextensions)) {

        if ($_FILES["file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
        } else {
            
                echo "<span>Your File Uploaded Succesfully...!!</span><br/>";


            if (file_exists("upload/" . $_FILES["file"]["name"])) {
                echo $_FILES["file"]["name"] . " <b>already exists.</b> ";
            } else {
                move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . time() . $_FILES["file"]["name"]);
                
            }
        
        }
    } else {
        echo "<span>***Invalid file Size or Type***<span>";
    }
    $link1 ="upload/" . time() . $_FILES["file"]["name"];

    


}


if(isset($link1))
{


   try {

        $user->update(array(
         
          'image' => $link1

        ));

       // Session::flash('home', ''); 
        //Redirect::to('index.php');
      

            }

            catch(Exception $e)
            {
        die($e->getMessage());
      }
} else {
   // Redirect::to('index.php');
}  


  


?>

<html>
<head>
  <title>upload pro pic</title>
<!-- link rel="stylesheet" href="styleup.css" / -->
<link rel="stylesheet" type="text/css" href="main.css" />
<link rel="stylesheet" type="text/css" href="rps.css" />

</head>
<body>

<nav id="top-menu">
    <ul>

        <li> <a href="index.php">Home</a> </li>
        <li> <a href="friends.php">Friends</a> </li>
        <li> <a href="">Messages</a> </li>
        <li><a href="update.php">Update</a></li>
        <li><a href="changepassword.php">Password</a></li>
        <li><a href="logout.php">Log out</a></li>

    </ul>
</nav>

<div id="maindiv">
    <pre>
    </pre>
<fieldset style="width:75%;margin:100px auto;"><legend ><h1 style="font-family: forte"> Upload profile pic </h1></legend>
    <br/>
    <form id="form" action="" method="post"enctype="multipart/form-data">

        <div id="upload"><input type="file" name="file" id="image" value="select"/></div>
        <br/>
        <input type="submit" id="submit" name="submit" value="Upload"/>
    </form>
</fieldset>
<pre>









</pre>

</div>

</body>
</html>