plurk_api_2.0_demo_php
======================

透過plurk api 2.0寫一個簡單的發噗回噗機器人 on php

使用方式請參閱http://www.plurk.com/API#/APP/ 看你要甚麼功能，
然後找到他的回傳網址(ex:http://www.plurk.com/APP/Timeline/plurkAdd)
跟回傳參數:
      --------------------------------------------------------
  		| content: The Plurk's text.                            |
			| qualifier: The Plurk's qualifier, must be in English. |
      --------------------------------------------------------
把它改成像是array("content"=>rawurlencode($message),"qualifier"=>$qulifier) 這樣的形式
丟進去do_action 裡面當參數即可。
by davidou 
