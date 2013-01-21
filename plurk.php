<?php
set_time_limit(0);


function do_action($url,$new_parms=array())
{
		$oauth_consumer_key = ""; //你的consumer_key talk
		$oauth_consumer_secret = ""; //你的consumer_secret
		$oauth_token = ""; //你的tokeny_key
		$oauth_token_secret = ""; //你的token_secret
	
  //  global $oauth_consumer_key,$oauth_token,$oauth_consumer_secret,$oauth_token_secret;
    $oauth_nonce = rand(10000000,99999999);
    $oauth_timestamp = time();
    $parm_array = array("oauth_consumer_key"=>$oauth_consumer_key,"oauth_nonce"=>$oauth_nonce,"oauth_consumer_key"=>$oauth_consumer_key,"oauth_signature_method"=>"HMAC-SHA1","oauth_timestamp"=>$oauth_timestamp,"oauth_token"=>$oauth_token,"oauth_version"=>"1.0");
    $parm_array = array_merge($parm_array,$new_parms);
    $base_string = sort_data($parm_array);
    $base_string = "POST&".rawurlencode($url)."&".rawurlencode($base_string);

    $key = rawurlencode($oauth_consumer_secret)."&".rawurlencode($oauth_token_secret);
    $oauth_signature = rawurlencode(base64_encode(hash_hmac("sha1",$base_string,$key,true)));

    $parm_array = array_merge($parm_array,array("oauth_signature"=>$oauth_signature));

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS,sort_data($parm_array)); 
    $data = curl_exec($ch); 

	
    curl_close($ch);
    return json_decode($data,TRUE);
}

function sort_data($data)
{
    ksort($data);
    $string="";
    foreach($data as $key=>$val)
    {
           if($string=="")
           {
            $string = $key."=".$val;
           }
           else
           {
               $string .= "&".$key."=".$val;
           }
    }
    return $string;
}
//
?>