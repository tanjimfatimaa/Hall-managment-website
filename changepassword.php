<?php
require_once 'core/init.php';

$user = new User();

if(!$user->isLoggedin()) {
	Redirect::to('index.php');
}

if(Input::exists()) {
	$validate = new Validate();
	$validation = $validate->check($_POST, array(
		
		'password_current' => array(
			'required' => true,
			'min' => 6,
		),
		'password_new' => array(
			'required' => true,
			'min' => 6,
		),
		'password_new_again' => array(
			'required' => true,
			'min' => 6,
			'matches' => 'password_new'
		)
	));

	if($validation->passed()) {

		if(Hash::make(Input::get('password_current'), $user->data()->salt) !== $user->data()->password) {
			echo 'Your current password is wrong';
		}else {
			$salt = Hash::salt(32);
			$user->update(array(
				'password' => Hash::make(Input::get('password_new'), $salt),
				'salt' => $salt
			));

			Session::flash('home', 'Your password has been changed');
			Redirect::to('index.php');
		}


	} else { 
		foreach ($validation->errors() as $error) {
		echo $error, '<br>';
	}	


	}
}


?>

<html lang="en">
<head>
    <meta charset="UTF-8" /> 
    <title>
        Change password
    </title>

    <link rel="stylesheet" type="text/css" href="main.css" />
    <link rel="stylesheet" type="text/css" href="rps.css" />

</head>

<nav id="top-menu">
	<ul>

		<li> <a href="profile.php?user=<?php echo escape($user->data()->username); ?>">Profile</a> </li>
        <li> <a href="friends.php">Friends</a> </li>
        <li> <a href="">Messages</a> </li>
        <li><a href="update.php">Update</a></li>
        <li><a href="logout.php">Log out</a></li>

	</ul>
</nav>

<body background = "backgrnd.JPG" >
<form action = "" method= "post" >
  <fieldset style="width:50%;margin:100px auto;"><legend ><h1 style="font-family: forte"> Change your password </h1></legend>
  	

		<table border="0">
					<tr>
					<div class ="field"><tr><td><label for="password_current">Current password</label></td><td><input type="password"  name="password_current" style="padding:10px 5px"  /></td></tr></div>
					<div class ="field"><tr><td><label for="password_new">New password</label></td><td><input type="password" name="password_new" id="password_new" style="padding:10px 5px" /></td></tr></div>
					<div class ="field"><tr><td><label for="password_new_again">New password again</label></td><td><input type="password" name="password_new_again" id="password_new_again" style="padding:10px 5px" /> </td></tr></div>
					
					<br/>
					<br/>
					<tr><td><input id="button" type="submit" value="Change"/></td></tr>
					
					<!-- input type="hidden"  name="token" value="<?php echo Token::generate(); ?>" -->
					
					</tr>
		</table>
	
	
	</fieldset>
</form>
</body>

</html>