<?php
/*------------------------------------------
使用方式請參閱http://www.plurk.com/API#/APP/ 看你要甚麼功能，然後找到他的回傳網址(ex:http://www.plurk.com/APP/Timeline/plurkAdd)
跟回傳參數:
			content: The Plurk's text.
			qualifier: The Plurk's qualifier, must be in English.
把它改成像是array("content"=>rawurlencode($message),"qualifier"=>$qulifier) 這樣的形式丟進去do_action 裡面即可。
by davidou 
------------------------------------------*/
include("plurk.php");

$qulifier='says';
$message="今日噗浪科技日報內容!";


$post_info = do_action("http://www.plurk.com/APP/Timeline/plurkAdd",array("content"=>rawurlencode($message),"qualifier"=>$qulifier));

//回文 
$reply="回噗內容";
do_action("http://www.plurk.com/APP/Responses/responseAdd",array("content"=>rawurlencode($reply),"qualifier"=>$qulifier,"plurk_id"=>$post_info[plurk_id]));

	?>
