<?php 
class Navigation {

	public static function baseNav($link, $print = true){
		if($print == true){
			echo APP_ROOT . $link;
		}else{
			return APP_ROOT . $link;
		}

	}
}

?>