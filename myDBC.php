<?php
error_reporting(E_ALL); //in production

class myDBC{

public $obj=null;

public function __construct(){

include_once "config.php";

$this->obj = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

if($this->obj->connect_errno){

   die("Error Occured, Please Try Again Later.");

}


}

public function __destruct(){


 $this->closeDB();

}


public function closeDB(){


 $this->obj->close();


}

public function runSingleQuery($statement){

$result = $this->obj->query($statement);

return $result;

}

public function runPrepared($statement){

	$result = $this->obj->prepare($statement);

	$result->execute();
	$result->bind_result($id, $firstname, $lastname, $age, $gender);
	
	$info = array();
	
	while($result->fetch()){
	
	$info['id'][] = $id;
	$info['firstname'][]= $firstname;
	$info['lastname'][] = $lastname;
	$info['age'][] = $age;
	$info['gender'][] = $gender;
	
	}
	return $info;

	

}

public function runMultiQuery($statement){

$result = $this->obj->multi_query($statement);

return $result;

}







}

?>