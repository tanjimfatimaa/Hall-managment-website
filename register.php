<?php
require_once 'core/init.php';




if(Input::exists()){
	

	$validate = new Validate();
	$validation = $validate->check($_POST, array(
		'username' => array(
			'name' => 'Username',
			'required' => true,
			'min' => 3,
			'max' => 20, 
			'unique' => 'users'
		),
		'password' => array(
			'required' => true,
			'min' => 6,
		),
		'password_again' => array(
			'required' => true,
			'matches' => 'password'
		),
		'name' => array(
			'required' => true,
			'min' => 3,
			'max' => 50
		)
	));
	

	if($validation->passed()){
	
		$user = new User();

		$salt = Hash::salt(32);
		

		try{

			$user->create(array(
				'username' =>Input::get('username'),
				'password' => Hash::make(Input::get('password'), $salt),
				'salt' => $salt,
				'name' => Input::get('name'),
				'roll' => Input::get('roll'),
				'department' => Input::get('department'),
				'boarder' => Input::get('boarder'),
				'room' => Input::get('room'),
			)); 

			Session::flash('home', 'You have been registered and can now log in!');	
			Redirect::to('index.php');

		}catch(Exception $e){
			die($e->getMessage());
		}

	}else{
		foreach ($validation->errors() as $error) {
		echo $error, '<br>';
		 } 
	}
}


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
            	<form action = "" method= "post" >
            		<div class ="field"><label for="username">Username* :<br/></label><input type="text"  name="username" id="username"/></div>
					<div class ="field"><label for="password">Password* :<br/></label><input type="password"  name="password"/></div>
					<div class ="field"><label for="password_again">Password again* :<br/></label><input type="password" name="password_again" id="password_again"/></div>
					<div class ="field"><label for="name">Name* : <br/></label><input type="name" name="name" value="<?php echo escape(Input::get('name')); ?>" id="name"/></div>
					<div class ="field"><label for="roll">Roll* : <br/></label><input type="name" name="roll" value="<?php echo escape(Input::get('name')); ?>" id="roll"/></div>
					<div class ="field"><label for="department">Department* : <br/></label><input type="name" name="department" value="<?php echo escape(Input::get('name')); ?>" id="department"/></div>
					<div class ="field"><label for="boarder">Boarder* : <br/></label><input type="name" name="boarder" value="<?php echo escape(Input::get('name')); ?>" id="boarder"/></div>
					<div class ="field"><label for="room">Room No* : <br/></label><input type="name" name="room" value="<?php echo escape(Input::get('name')); ?>" id="room"/></div>
					
					<br/>
					<br/>
					<input type="hidden"  name="token" value="<?php echo Token::generate(); ?>">
					<input id="button" type="submit" value="Register"  />
					
				</form>	
           
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


