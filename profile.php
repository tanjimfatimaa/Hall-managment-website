<?php
require_once 'core/init.php';

if(!$username = Input::get('user')) {
	Redirect::to('index.php');


} else {
	$user = new User($username);

	if(!$user->exists()) {
		Redirect::to(404);
	} else {
		$data = $user->data();
	}
?>

  <!-- p><h1><a href="profile.php?user= <?php echo escape($data->username); ?>"><?php echo escape($data->username); ?></a></h1></p>
<p>Full Name : <?php echo escape($data->name); ?></p  -->

<?php

}
 
?>

<html lang="en">
<head>
    <meta charset="UTF-8"/> 
    <title>
        Mahadi messemger
    </title>

    <link rel="stylesheet" type="text/css" href="main.css" />
    <link rel="stylesheet" type="text/css" href="rps.css" />

</head>

<body>

	
<nav id="top-menu">
	<ul>

		<li> <a href="index.php">Home</a> </li>
        <li> <a href="friends.php">Friends</a> </li>
        <li> <a href="messages.php">Messages</a> </li>
        <li><a href="update.php">Update</a></li>
        <li><a href="changepassword.php">Password</a></li>
        <li><a href="logout.php">Log out</a></li>

	</ul>
</nav>

<div id="maindiv">
<header>

    <?php 


    


    ?>
    <?php $v= $data->image; ?>
    <img class="img-right" src=<?php echo $v; ?> 
        alt="no image uploaded" width="240" height="240" />
    <hgroup>
        <p><h1><a href="profile.php?user=<?php echo escape($data->username); ?>"><?php echo escape($data->name); ?></a></h1></p> 
        <h6>Studies <?php echo escape($data->education); ?> </h6> 
    </hgroup>
    
</header>

<article class="story">
    <h1> About me </h1>
    <p>
         <?php echo escape($user->data()->about); ?>
    </p>

	
	<h1> Favourite Quotes </h1>
 
		
        <p>
        	<!--  # Nothing is truth, Everything is permitted. -->
            <?php echo escape($user->data()->quotes); ?>
            <p>__________________________________________________</p>

        </p>

        <p>
        	
        </p>
				
		<li><a href="index.php">Return Home</a></li>
    
</article>

<aside class="about">
    <!-- eirgiebgbi ebv uerge  uerigiergbiuergiegbgbebgoebg -->

    <!-- kdfgi;n ovbp9nhpvgbgn wgngtpgwtghgiulhrigjei rlgh  -->
<?php 
    if(1){

?>

    <tr><td><a href="upload.php"><h6>upload photo<h6></a></td></tr>

 <?php 

    } 


 ?>   
    <pre>

    </pre>
    <header>
        <h1> <!--Study level --></h1>
        
    </header>
	<p><!-- ?php echo escape($data->education); ? --></p>

    <section>

        <hgroup>
            <h1> Home town </h1>
            <p> <?php echo escape($data->town); ?></p>
			<h1> Current city </h1>
            <p> <?php echo escape($data->city); ?></p>
        </hgroup>
        
    </section>
    <section>
        <hgroup>
            <h1> Date of Birth </h1>
             <p> <?php echo escape($data->bday); ?></p>
            
        </hgroup>
        
    </section>
    <section>
        <hgroup>
            <h1> Interests </h1>
            
        </hgroup>
        <p> watching movie </p>
    </section>
</aside>

<div class="clear"></div>
</div>

<form id="searchbox" action="">
    <input id="search" type="text" placeholder="Type here">
    <input id="submit" type="submit" value="Find Friend">
</form>

<footer>
    <p>
        Copyright &copy; 2015 Mahadi Mohammad Al Zihadi.
    </p>
</footer>


</body>

</html>

