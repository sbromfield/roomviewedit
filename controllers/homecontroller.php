<?php

class homecontroller
{

	public function __construct(){
	
	}
	
	public function display(){
		if(auth::isloggedin())
		{
			$myDirectory = opendir(__mediafiles__);
			$dirArray = array();
			
			while($entryName = readdir($myDirectory)) {
				if( strcmp($entryName, ".") == 0 or strcmp($entryName,"..") == 0
				or strcmp($entryName,"rss.xsl") == 0 ){
					continue;
				}		
				$dirArray[] = $entryName;
			}
			closedir($myDirectory);
			
			global $smarty;
			$smarty->assign("data", $dirArray);
			$smarty->display("home.tpl");
			
		}else{
			echo "Not logged in!";
		}
	}
}

?>