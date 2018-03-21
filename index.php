<?php
require_once 'core/init.php';

if(Input::exists()) {
    
        

        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'username' => array('required' => true),
            'password' => array('required' => true)

            ));

        if($validation->passed()) {
            $user = new User(); 

            $remember = (Input::get('remember') === 'on' ) ? true : false;

            $login = $user->login( Input::get('username'), Input::get('password'), $remember); 
            
            

            if($login) {
               
                Redirect::to('myProfile.php');

            } else{
                echo '<p>Sorry, logging in failed.</p>';
                Redirect::to('profile.php');
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
    <title>KUET | Rokeya Hall </title>
    <link rel="stylesheet" type="text/css" href="my.css">
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
                <img src="images/rokeya folok.jpg" height="70%" width="100%"/>
            </div>
            <marquee><h3>Welcome to Rokeya Hall</h3></marquee>
        </div>
        <div class="right_side">
            <center>
             <h2>Login</h2><hr/>
             <form action="index.php" method="post">
             <small>User ID:</small><input name="username"  type="text" id="username" placeholder="" required title=""/><br/>
             <small>Password:</small><input name="password" type="password" id="password" placeholder="" required/> <br/>
             <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
             <input name="submit" type="submit" value="Login" id="button"/> <input name="submit" type="reset" value="Reset"/><br/>
             <input name="chkbx" type="checkbox" value="1" id="remember" style="float:center;" /><small>Keep me logged in</small>
             </form>
             <a href="#">Login as Admin</a>
                </center>
        </div>
    </div>
    <div class="footer">
        </br><b><p>&copy; tj muna 2014</p></b>
    </div>
</body>
</html>



  