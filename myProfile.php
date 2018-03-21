<?php
require_once 'core/init.php';

if(!$username = Input::get('user')) 
	{
		Redirect::to('index.php');
	} 

else 
	{
		

	?>

<html>
<head>
    <title>KUET | Rokeya Hall </title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="header">
        <div class="banar">
            <img src="images/logo.jpg"></img>
            <h1>Khulna University Of Engineering and Technlogy<br/>
                <small>Rokeya Hall</small></h1>
        </div>
        <div class="menu">
            <ul>
                <li> <a href="index.php"> Home </a> </li>
                <li> <a href="pictures.php"> Gallery </a> </li> 
                 <li> <a href=""> Contact </a> </li> 
            </ul>
        </div>
    </div>
    <div class="content">
        <div class="left_side">
        </div>
        <div class="main_content" width="70%" height="100%">
            <div>
               <?php 
               		echo "Hello";
               ?>
            </div>
     
        </div>
        <div class="right_side">
            
        </div>
    </div>
    <div class="footer">
        </br><b><p>&copy; tj muna 2014</p></b>
    </div>
</body>
</html>