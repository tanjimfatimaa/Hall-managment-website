<?php
require_once 'core/init.php';

//var_dump(Token::check(Input::get('token')));

if(Input::exists()) {
	//echo 'dhu';
	//echo Input::get('token');
	//if(Token::check(Input::get('token'))) {
		

		$validate = new Validate();
		$validation = $validate->check($_POST, array(
			'username' => array('required' => true),
			'password' => array('required' => true)

			));

		if($validation->passed()) {
			$user = new User();	

			$remember = (Input::get('remember') === 'on' ) ? true : false;

			$login = $user->login( Input::get('username'), Input::get('password'), $remember); // parameter OK...
			
			//var_dump($login);

			if($login) {
				//echo '<br> Success';
				Redirect::to('index.php');

			} else{
				echo '<p>Sorry, logging in failed.</p>';
			}


		} else{
			foreach ($validation->errors() as $error ) {
				echo $error, '<br>';
			}
		}
	//}
}

?>



<html>
<head>
	<title>Log in</title>

	<!--  link rel="stylesheet" type="text/css" href="main.css" / > 
    <!- link rel="stylesheet" type="text/css" href="rps.css" / -->

</head>

	<body background = "backgrnd.JPG" >

	<form action="/project/login.php" method="post">
	<fieldset style="width:50%;margin:100px auto;"><legend ><h1 style="font-family: forte"> Login to your account </h1></legend>
		<br/>

<!-- ?php
if(isset($_GET['login_error']) && $_GET['login_error'] == 'yes'){

? -->
<!-- p style="color:red"><strong>"Your Username and Password didn't match,please try again !" </strong></p -->


		<table border="0">
			<tr>
			<div class ="field"><tr><td><label for="username">Username</label></td><td><input type="text"  name="username" id="username" style="padding:10px 5px" autocomplete="off"  /></td></tr></div>
			<div class ="field"><tr><td><label for="password">Password</label></td><td><input type="password"  name="password" id="password" style="padding:10px 5px" autocomplete="off" /></td></tr></div>
			<br/>
			<br/>
			<div class ="field"><tr><td><label for="remember"><input type="checkbox" name="remember" id="remember" style="padding:10px 45px" />Remember me</label></td></tr></div>
			<!-- input type="hidden"  name="token" value="<?php echo Token::generate(); ?>" -->
			<tr><td><input id="button" type="submit" value="Login"  /></td></tr>
			</tr>
		</table>
		<pre>Need an account? <a href="register.php"> Sign up</a> here</pre>

	</fieldset>
</form>

 

</body>

</html>