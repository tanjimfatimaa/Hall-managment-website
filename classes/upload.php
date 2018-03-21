<?php 
class User{
  private $_db,
          $_data,

$user = new User();

if(!$user->isLoggedin()) {
  Redirect::to('index.php');
}

public function __construct($user = null) {
    $this->_db = DB::getInstance();
}




$user_id=$_SESSION['id'];
      if(basename($_FILES["cover"]["name"])){
      $timezone = date("D, d M Y H:i:s A");
      $prefix1=$_SESSION['id'].time();
      $link1="/project/upload/".$prefix1. basename($_FILES["cover"]["name"]);
      move_uploaded_file($_FILES["cover"]["tmp_name"],$link1);
    //echo $link1;
      } 
     
    

    $sql="UPDATE users SET image ='$link1' WHERE id='$user_id';";
    mysql_query($sql);


?>


