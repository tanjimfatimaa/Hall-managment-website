<?php 
class User{
	private $_db,
			$_data,
			$_sessionName,
			$_cookieName,
			$_isLoggedIn;

	public function __construct($user = null) {
		$this->_db = DB::getInstance();

		$this->_sessionName = Config::get('session/session_name');
		$this->_cookieName = Config::get('remember/cookie_name');

		if(!$user) {
			if(Session::exists($this->_sessionName)) {
				$user = Session::get($this->_sessionName);

				if($this->find($user)) {
					$this->_isLoggedIn = true;
				}else {
					//process logOut;
				}
			}
		}else {
			$this->find($user);
		}
	}

	public function update($fields = array(), $id = null) {

		if(!$id && $this->isLoggedIn()) {
			$id = $this->data()->id;
		}

		if(!$this->_db->update('users', $id, $fields)) {
			throw new Exception('There was a problem processing update. ');
			
		}
	}

	public function create($fields = array()) {
		if(!$this->_db->insert('users', $fields)) {
			throw new Exception('There was a problem creating an account');
		}
	}

	public function find($user = null){
		if($user) {
			$field = (is_numeric($user)) ? 'id' : 'username';
			$data = $this->_db->get('users', array($field, '=', $user));

			if($data->count()){ 
				
				$this->_data = $data->first(); // Fault was here ... i missed an underscore
				return true;   
				}
			}
			return false;
		}
		

		/********/


		public function findFriend($user = null){
		if($user) {
			$field = (is_numeric($user)) ? 'id' : 'username';
			
			$data = $this->_db->getFriend('friends', array('my_id', '=', $user));

			if($data->count()){ 
				
				$size = $data->count();
               // echo $data->result();

                $get= $data->result();
                //echo $get[0]->fnd_id;

				$this->_data = $data->result(); // Fault was here ... i missed an underscore
                
				return $data->result();  
				}
			}
			return $data->result(); 
		}

		/*******/

		public function findUserFriend($user = null){
		if($user) {
			$field = (is_numeric($user)) ? 'id' : 'username';
			
			$data = $this->_db->getUserFriend('users', array($field, '=', $user));
             
			if($data->count()){ 
				
				$size = $data->count();
               // echo $data->result();

                $get= $data->result();
                //$new = $get[4]->users;

				$this->_data = $data->result(); // Fault was here ... i missed an underscore
                
				//echo $data->result();

				return $data->result();  
				}
			}
			return $data->result(); 
		}
         

         /********************/

         public function findCplx($user1 = null, $user2 = null){
        
		if($user1 && $user2) {		
			$field1 = (is_numeric($user1)) ? 'id' : 'username';
			$field2 = (is_numeric($user2)) ? 'id' : 'username';
			//problem is here
			$data = $this->_db->getCplx('message_set', array($field1, '=', $user1, $field2, '=', $user2, $field1, '=', $user2, $field2, '=', $user1));
            var_dump($data);
			if($data->count()){ 
				var_dump($data->result()); 
				//return $data->result(); 
				//return true;   
				}
			}
			return false;
		}


		public function insertHash($user1=null, $user2=null, $hash3=null) {

			$this->_db->insert('message_set', array(

				'user1' => $user1,
				'user2' => $user2,
				'hash' => $hash3

			));

			echo 'Haw maw khaw';

			return true;
		}



	/****************************/

	public function login($username = null, $password = null, $remember = false) {
		//$user = $this->find($username);
		//echo $user;
		//print_r($this->data);

		if(!$username && !$password && $this->exists() ) {
			Session::put($this->_sessionName, $this->data()->id);
		} else {
			$user = $this->find($username);

		if($user){ //echo ($this->data()->password === Hash::make($password, $this->data()->salt));
			if( $this->data()->password === Hash::make($password, $this->data()->salt) ) {    //var_dump($this->data());//echo 'password matched!';//echo $this->data()->password, '<br>';//echo Hash::make($password, $this->data()->salt);//var_dump($this->_sessionName) ;//echo $this->data()->id;
				Session::put($this->_sessionName, $this->data()->id);

				if($remember){
					$hash = Hash::unique();
					$hashCheck = $this->_db->get('users_session', array('user_id', '=', $this->data()->id));
					
					if(!$hashCheck->count()) {
						$this->_db->insert('users_session', array(
							'user_id' => $this->data()->id,
							'hash' => $hash

						));
					} else {
						$hash = $hashCheck->first()->hash;
					}

					Cookie::put($this->_cookieName, $hash, Config::get('remember/cookie_expiry'));
				}

				return true;
			}
		}
		
	}
	return false;
}	

	public function exists(){
		return(!empty($this->_data)) ? true : false;
	}

	public function logout() {

		$this->_db->delete('users_session', array('user_id', '=', $this->data()->id));
		Session::delete($this->_sessionName);
		Cookie::delete($this->_cookieName);
	}


	public function data(){  /// HERE >_< 
		return $this->_data ;
	}

	public function isLoggedIn() {
		return $this->_isLoggedIn;
	}



}