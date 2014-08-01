<?php

class editfile
{
	private $dom;
	private $path;

	public function __construct($fpath)
	{	
		$this->path = $fpath;
		$this->dom = new DOMDocument();		
		$this->dom->load($fpath);			
	}
	
	public function remove($strs)
	{
		
		$xpath = new DOMXPath($this->dom);
		foreach($strs as $str ){
			
			$query = '//rss/channel/item/guid[boolean(.="'.urldecode($str).'")]';
			$entries  = $xpath->query($query);

			file_put_contents($this->path.".bk", $this->dom->saveXML());
			foreach ($entries as $entry) {
				$entry->parentNode->parentNode->removeChild($entry->parentNode);
				
			}
		}
		//need to write this out to a file
		file_put_contents($this->path, $this->dom->saveXML());
	}
}

?>