<?php
	include 'Users.php';
	$_SERVER['REQUEST_URI'] = urldecode($_SERVER['REQUEST_URI']);
	$url = explode('/', $_SERVER['REQUEST_URI']);

	$users = new Users('localhost', 'root', '', 'test');
	$query = $users->query("SELECT `link`, `id` FROM `users2`");
	$i = '0';
	while($row = $query->fetch_assoc()){
		$array['id'][$i] = $row['id'];
		$i++;
	}
	
	$userID = preg_replace('/^id/', '', $url['1']);

	if(in_array($userID, $array['id'])){
		$userData = $users->getUserDataFromID($userID);
		$page = 'userProfilePage.php';
	}elseif($users->getUserIDFromLink($url['1'])){
		$userData = $users->getUserDataFromID($users->getUserIDFromLink($url['1']));
		$page = 'userProfilePage.php';
	}else{
		switch($url['1']){
			case 'video':
				$page = 'video.php';
				break;
			default:
				$page = 'home.php';
				break;
		}
	}
	
	include 'header.php';
	include $page;
	include 'footer.php';
?>