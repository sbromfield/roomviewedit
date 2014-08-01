<?php
require_once "c:\\inetpub\\wwwroot\\wowzaedit\\classes\\editfile.php";
	if(isset($_GET['box']))
	{
		$r = new editfile("c:\\tmp\media\\PG5 153 Test 4 3F9B35C2-78DF-472F-AC83-3E13EB390B04\mediaRSS.xml");
		$r->remove("https://coursecapture.fiu.edu/CrestronMediaPlayer/PG5 153 Test 4 3F9B35C2-78DF-472F-AC83-3E13EB390B04/023320a6-6c55-4470-8381-836e7e3526a6");
		/*foreach($_GET['box'] as $box)
		{
			
		}*/
	}
?>