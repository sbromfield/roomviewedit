<?php

class indexcontroller
{

	public function __construct(){

	}

	public function display(){
		if(!empty($_POST['pass'])){
			if(auth::isloggedin()){
				header("location: mediaedit.php?action=home");
				die();
			}else{
				if(auth::login()){
					header("location: mediaedit.php?action=home");
					die();
				}
			}
		}
		global $smarty;
		
		$smarty->display('index.tpl');
	}
}

?>