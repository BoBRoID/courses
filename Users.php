<?php
class Users extends Mysqli{

	function getUserDataFromID($userID){
		$query = $this->query("SELECT * FROM `users2` WHERE `id` = '{$userID}'");
		while($row = $query->fetch_assoc()){
			$array = $row;
		}
		return $array;
	}
	
	function getUserIDFromLink($link){
		$query = $this->query("SELECT `id` FROM `users2` WHERE `link` = '{$link}'");
		if($query->num_rows >= '1'){
			while($row = $query->fetch_assoc()){
				return $row['id'];
			}
		}else{
			return false;
		}
	}

}
?>