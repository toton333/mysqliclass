<?php
require_once "myDBC.php";

$connection = new myDBC();

$query = "select * from customer";

$information = $connection->runPrepared($query);



echo "<pre>",print_r($information, true), "</pre>";

foreach($information as $key=>$value){

  echo "<b>values of {$key} are: </b><br/>";
  
  foreach($value as $v){
  
   echo "<i>", $v, "</i><br/>";
  }
  echo "<br/>";

}

/*

if($result = $connection->runSingleQuery($query)){


  if($result->num_rows){
  
    $result->data_seek(0); //offset pointer to the first row, if it is set to data_seek(2) for example it will not show the first two rows
    while($row = $result->fetch_object()){
	
	
	  echo $row->firstname,"<br/>";
	
	}
	
  }else{
  
   echo "no info";
  
  }

}else{
  echo "some error occured";

}


*/

?>

