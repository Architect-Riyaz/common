<?php 
class queryClass{
	
	//update Query	
	//HINT : table_name updating table name value,check Array is WHERE clause with values, $options SET VALUES
	public function updateQuery($table_name,$checkArray,$options = array()){
		$check = ' WHERE ';
		if(count($checkArray) == 1){
			foreach($checkArray as $k=>$v){
				$check .= $k."=".$v;
			}			
		}else{
			foreach($checkArray as $k=>$v){
				$check .= $k."=".$v." AND ";
			}
		}
		$check = rtrim($check, ", ");
		$sql = "UPDATE ".$table_name." SET "; 
		foreach($options as $key=>$value){
		  $sql .= $key."='".$value."', ";
		}    
		$sql = rtrim($sql, ", ");
		$sql .= $check;
		return $sql;
	}
	
	public function selectQuery($table_name,$checkArray){
		$check = ' WHERE ';
		if(count($checkArray) == 1){
			foreach($checkArray as $k=>$v){
				$check .= $k."=".$v;
			}			
		}else{
			foreach($checkArray as $k=>$v){
				$check .= $k."=".$v." AND ";
			}
		}
		$check = rtrim($check, ", ");
		$sql = "SELECT *
            FROM ".$table_name;
		$sql .= $check;
		return $sql;
	}
	
	public function deleteQuery($table_name,$checkArray){
		$check = ' WHERE ';
		if(count($checkArray) == 1){
			foreach($checkArray as $k=>$v){
				$check .= $k."=".$v;
			}			
		}else{
			foreach($checkArray as $k=>$v){
				$check .= $k."=".$v." AND ";
			}
		}
		$check = rtrim($check, ", ");
		$sql = "DELETE FROM ".$table_name;
		$sql .= $check;
		return $sql;
	}
}

?>