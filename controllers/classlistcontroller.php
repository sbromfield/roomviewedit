<?php

class classlistcontroller
{

	public function __construct(){

	}

	public function display(){
		$link = array();
		$date = array();
		
		if(!auth::isloggedin()){
			header("location: mediaedit.php?action=index");
		}
		if(!empty($_GET['course'])){
			$path = __mediafiles__."\\".$_GET['course']."\\mediaRSS.xml";
			if(file_exists($path)){
				$xml = simplexml_load_file($path);
				foreach($xml->channel->item as $line){
					$link[urlencode($line->guid)] = $line->link;
					$date[] = $line->title;
				}
			}
		}
		
		if(!empty($_GET['box']) && !empty($_GET['path'])){
			$path = __mediafiles__."\\".$_GET['course']."\\mediaRSS.xml";
			$r = new editfile($path);
			//foreach($_GET['box'] as $box)
			//{
				$r->remove($_GET['box']);
			//}
		}
		
		
		global $smarty;
		$smarty->assign("dates", $date);
		$smarty->assign("link", $link);
		$smarty->assign("path", $_GET['course']);
		$smarty->assign("course", $_GET['course']);
		$smarty->display('classlist.tpl');
	}
}

?>