<?php
class DB {
	private static $_instance = null;
	private $_pdo,
			$_query,
			$_error = false,
			$_results,
			$_count = 0;

	private function __construct(){
		try{
			$this->_pdo = new PDO('mysql:host=' . Config::get('mysql/host') . ';dbname=' . Config::get('mysql/db'), Config::get('mysql/username'), Config::get('mysql/password'));     
			//echo 'Connected';
		}catch(PDOException $e){
			die($e->getMessege());
		}
	}

	public static function getInstance(){
		if(!isset(self::$_instance)){
			self::$_instance = new DB();
		}
		return self::$_instance;
	}

	public function execute(){

		}

	public  function query($sql, $params = array()){
		$this->_error = false;

		if($this->_query = $this->_pdo ->prepare($sql)){
			//echo 'Success';
			$x = 1;
			if(count($params)){
				foreach ($params as $param) {
					$this->_query->bindValue($x, $param);
					$x++;
				} 
			}	
    
			if($this->_query-> execute()){
				//echo'SucceSSSS';
				$this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ); 
				$this->_count = $this->_query->rowCount();
			}else{
				$this->_error = true;
			}    
		}
		return $this;
	}



	public function action($action, $table, $where = array() ){
		if(count($where) ===  3){
			$operators = array('=', '>', '<', '>=', '<=', '!=');

			$field      = $where[0];
			$operator   = $where[1];
			$value      = $where[2];

			if(in_array($operator, $operators)){
				$sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";

				if(!$this->query($sql, array($value))->error()){
					return $this;
				}
			}
		}
		return false;
	}

	public function get($table, $where){
		return $this->action('SELECT *', $table, $where);
	}

	/************************/

	public function actionCplx($action, $table, $where = array() ){
		if(count($where) ===  9){
			$operators = array('=', '>', '<', '>=', '<=', '!=');

			$field1      = $where[0];
			$operator   = $where[1];
			$value1      = $where[2];
			$field2      = $where[3];
			$value2      = $where[4];
			$field3      = $where[5];
			$value3      = $where[6];
			$field4      = $where[7];
			$value4      = $where[8];


			if(in_array($operator, $operators)){
				$sql = "{$action} FROM {$table} WHERE ({$field1} {$operator} ? AND {$field2} {$operator} ?) OR ({$field3} {$operator} ? AND {$field4} {$operator} ?)";

				if(!$this->query($sql, array($value))->error()){
					return $this;
				}
			}
		}
		return false;
	}

	public function getCplx($table, $where){
		return $this->actionCplx('SELECT hash', $table, $where);
	}

	/************************/

	/***/
	public function getFriend($table, $where){
		return $this->action('SELECT *', $table, $where);
	}

	/***/
	/***/

	public function getUserFriend($table, $where){
		return $this->action('SELECT *', $table, $where);
	}




	/***/

	public function delete($table, $where){
		return $this->action('DELETE', $table, $where);
	}

	public function insert($table, $fields = array()){
		if(count($fields)) {
			$keys = array_keys($fields);
			$values = '';
			$x = 1;

			foreach ($fields as $field) {
				$values .= '?';
				if($x < count($fields)){
					$values .= ', ';
				}
				$x++;
			}

			//die($values);

		 	$sql = "INSERT INTO {$table} (`" . implode('`, `', $keys) . "`) VALUES ({$values})";

		 	if(!$this->query($sql, $fields)->error()){
		 		return true;
		 	}
		}
		return false;
	}

	public function update($table, $id, $fields){
		$set = '';
		$x = 1;

		foreach ($fields as $name => $value) {
			$set .= "{$name} = ?";

			if($x < count($fields)) {
				$set .= ', ';
			}

			$x++;
		}

		//die($set);

		$sql = "UPDATE {$table} SET {$set} WHERE id = {$id}";

		//echo $sql;

		if(!$this->query($sql, $fields)->error()){
			return true;
		}

		return false;
	}

	public function result(){
		
		return $this->_results;
	}

	public function res(){
		
		return $this->_results->fnd_id;
	}

	
   
	public function first(){
		//return $this->rslt();
		$demo = $this->result();
		return $demo[0];
	}

	public function error(){
		return $this->_error;
	}

	public function count(){
		return $this->_count;
	}

}
