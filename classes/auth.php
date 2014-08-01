<?php
class auth
{

	public static function isloggedin(){
		$id = session_id();
		if(strlen($id)==0){
			session_start();
}			

		if(!isset($_SESSION['loggedin'])){
			session_destroy();
			return False;
		}
		return True;
	}

	public  static function login(){
		if(self::isloggedin()){
			return True;
		}
		
		if(self::checkpw($_POST['pass'])){
			$id = session_id();
			if($id == 0){
				session_start();
			}
			$_SESSION['loggedin'] = True;
			
		}else{
			return False;
		}
		return True;
	}
	
	public  static function logout(){
		if(self::isloggedin()){
			session_destroy();
}	}
	
	private static function checkpw($passwd){
		return $passwd == self::getpasswd()? true : false;
	}
	
	private static function getpasswd(){
		$file = fopen(__passwdfile__,"r");	
		$r = fgets($file);
		fclose($file);
		return $r;
	}
}
?>