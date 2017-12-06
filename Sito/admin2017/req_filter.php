<?php
function sanitize_array($arr){
	if(!is_array($arr)){
		if(get_magic_quotes_gpc())
			$arr=stripslashes($arr);
		$arr=htmlentities($arr,ENT_QUOTES);
		$arr=str_replace("_","&#95;",$arr);		//_ to &#95; (SQLI)
		return str_replace("%","&#37;",$arr);	//% to &#37; (SQLI)
		}
	foreach($arr as $key=>$val)
		$arr[$key]=sanitize_array($val);
	return $arr;
	}
$_POST=sanitize_array($_POST);
$_GET=sanitize_array($_GET);
$_SERVER=sanitize_array($_SERVER);
?>