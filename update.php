<?php
require_once 'core/init.php';

$user = new User();

if(!$user->isLoggedin()) {
	Redirect::to('index.php');
}


if( Input::exists() ) {
	$validate = new Validate();
	$validation = $validate->check($_POST, array(
		/*'username' => array(
			'name' => 'Username',
			'required' => true,
			'min' => 3,
			'max' => 20, 
			'unique' => 'users'
		),*
		'password' => array(
			'required' => true,
			'min' => 6,
		),
		/*'password_again' => array(
			'required' => true,
			'matches' => 'password'
		),*/
		'name' => array(
			'required' => true,
			'min' => 3,
			'max' => 50
		),
		'city' => array(
			'max' => 50
		),
		'town' => array(
			'max' => 50
		),
		'education' => array(
			'max' => 1000
		)

	));


	if($validation->passed()) 
	{

		try {
				$user->update(array(
					'name' => Input::get('name'),
					'city' => Input::get('city'),
					'town' => Input::get('town'),
					'education' => Input::get('education'),
					'bday' => Input::get('bday'),
					'about' => Input::get('about'),
					'quotes' => Input::get('quotes')
				//'image' => 'hello world'

				));

				Session::flash('home', '');	
				Redirect::to('index.php');

            }
            catch(Exception $e)
            {
				die($e->getMessage());
			}
	} 

	else 
	{ 
			foreach ($validation->errors() as $error) 
			{
				echo $error, '<br>';
	   		}	


	}
}

?>

<html >
<head>
	<title>Update info</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
    <link rel="stylesheet" type="text/css" href="rps.css" />
</head>
<body>

<nav id="top-menu">
	<ul>

		
        <li> <a href="profile.php?user=<?php echo escape($user->data()->username); ?>">Profile</a> </li>
        <li> <a href="friends.php">Friends</a> </li>
        <li> <a href="">Messages</a> </li>
        <li><a href="changepassword.php">Password</a></li>
        <li><a href="logout.php">Log out</a></li>

	</ul>
</nav>

<div id ="maindiv">
<pre>

</pre>

<form action="/project/update.php" method="post" accept-charset="UTF-8" enctype="application/x-www-form-urlencoded">
	<fieldset style="width:75%;margin:100px auto;"><legend ><h1 style="font-family: forte"> Update your information </h1></legend>
		<br/>
		<table border="0">
			<tr>
			<div class ="field"><tr><td><label for="name">Change name</label></td><td><input type="text" name="name" value="<?php echo escape($user->data()->name); ?>" id="name"style="padding:10px 5px"  /></td></tr></div>
			<div class ="field"><tr><td><label for="name">Current city</label></td><td><input type="text" name="city" value="<?php echo escape($user->data()->city); ?>" id="city"style="padding:10px 5px"  /></td></tr></div>
			<div class ="field"><tr><td><label for="name">Home town</label></td><td><input type="text" name="town" value="<?php echo escape($user->data()->town); ?>" id="town"style="padding:10px 5px"  /></td></tr></div>
			<div class ="field"><tr><td><label for="name">Study level</label></td><td><input type="text" name="education" value="<?php echo escape($user->data()->education); ?>" id="education"style="padding:10px 5px"  /></td></tr></div>
			<div class ="field"><tr><td><label for="name">Birthday</label></td><td><input type="date" name="bday" max="2000-01-01" max="1979-12-31" value="<?php echo escape($user->data()->bday); ?>" id="bday"style="padding:10px 5px"  /></td></tr></div>
			<div class ="field"><tr><td><label for="name">About me</label></td><td><input type="text" name="about" value="<?php echo escape($user->data()->about); ?>" id="about" style="padding:50px 5px"  /></td></tr></div>
			<div class ="field"><tr><td><label for="name">Fav quotes</label></td><td><input type="text" name="quotes" value="<?php echo escape($user->data()->quotes); ?>" id="quotes" style="padding:25px 5px"  /></td></tr></div>
			
			<br/>
			<br/>
			<!-- input type="hidden"  name="token" value="<?php echo Token::generate(); ?>" -->
			<tr><td><input id="button" type="submit" value="Update" /></td></tr>
			<!-- ?php Redirect::to('update.php'); ? -->
			</tr>
		</table>
	</fieldset>
</form>

<pre>












</pre>

</div>
</body>
</html>
